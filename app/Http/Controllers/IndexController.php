<?php

namespace App\Http\Controllers;

use App\Component\Esearch\SearchClient;
use App\Events\OrderShipped;
use App\Models\FinanceReport;
use App\Models\FinanceReportDetail;
use App\Models\Post;
use App\Models\RoloUsersModel;
use App\Models\User;
use App\Models\Users;
use App\Service\UserService;
use Facebook\WebDriver\Cookie;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Repositories\UsersRepository;

class IndexController extends Controller
{

    /** @var UsersRepository 注入的UserRepository */
    private $usersRepository;


    /**
     * 测试使用repository 处理需要和数据库交互的非逻辑业务代码
     *
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index()
    {
//        $users = $this->usersRepository->getAgeLargeThan(4000);

        $users = Users::findOrFail(20);
        event(new OrderShipped($users));

//        return view('paul', compact('users'));
//        dd($this->usersRepository->getAgeLargeThan(5000));
        return view('zzz');
    }


    public function es() {
        $client = SearchClient::getInstance();
        $params = [
            'index' => 'zsl',
            'type' => 'paul',

            'body' => [
                'testField' => 'abc'
            ]
        ];

        $response = $client->index($params);
        return $response;
    }

    public function esSearch()
    {
        $client = SearchClient::getInstance();
        $params = [
            'index' => 'zsl',
            'type' => 'paul',
            'body' => [
                'query' => [
                    'match' => [
                        'testField' => 'abc'
                    ]
                ]
            ]
        ];

        $response = $client->search($params);
        return $response;
    }

    public function esDelete()
    {
        $client = SearchClient::getInstance();
        $params = [
            'index' => 'zsl',
            'type' => 'paul',
            'id' => 'wzq3VWgBUBegGYIS9ELv'
        ];

        $response = $client->delete($params);
        return $response;
    }


    public function testNotify() {
        Users::noti();
    }

    public function testNotifyA() {

    }



//    /** @var Request $userService 将服务注册到Controller中 */
//    public $request;
//    protected $userService;
//
//    public function __construct(Request $request, UserService $service)
//    {
//        $this->request = $request;
//        $this->userService = $service;
//    }
//    public function register()
//    {
//        $this->userService->register($this->request->all());
//        return 123;
//    }


    public function showProfile($id) {

        $values = Redis::get('name');

        dd($values);

        return view('user.profile', ['user' => $user]);
    }

    public function setCache($id) {
//        Cache::store('database')->put('key', $id, 10);
        Redis::set('name', $id);
        Cache::store('redis')->put('zsl', "i'm paul", 10);
    }


    public function FacadeTest()
    {
        echo 123;
    }

    public function testA () {
        $languages = ['php', 'python', 'scala'];

        foreach ($languages as &$lang)
            $lang = strtoupper($lang);

        echo $lang . "\n";

    }


    public function testZZZ()
    {
        $users = Users::where('votes', '>', 5000)->get();
        $users->each->makeAsVip();
        dd($users->toArray());
    }


    public function paul($id)
    {
        $report = FinanceReport::find($id);
        $return = [];

        $return['total']['excel_amount'] = $report->excel_amount;
        $return['total']['last_currency'] = $report->last_currency;
        $return['total']['sum_total_amount'] = strval($report->excel_amount + $report->surplus_amount);

        $res = FinanceReportDetail::where('mid', $id)->get()->groupBy('date');

        foreach ($res as $key => $value)
        {
            $date = date('Y-m', strtotime($key));
            foreach( $value as $kk => $record) {
                if (!isset($return['list'][$date][$record->currency]['sum_amount'])) {
                    $return['list'][$date][$record->currency]['sum_amount'] = $record->amount;
                    $return['list'][$date][$record->currency]['conversion'] = $record->conversion;
                } else {
                    $return['list'][$date][$record->currency]['sum_amount'] += $record->amount;
                    $return['list'][$date][$record->currency]['conversion'] += $record->conversion;
                }
                $return['list'][$date][$record->currency]['exchange_rate'] = $record->exchange_rate;
            }
        }


        dd($return);


















        foreach ($res as $key => $record){
            if (!isset($return['detail'][$record->currency]['sum_amount'])) {
                $return['detail'][$record->currency]['sum_amount'] = $record->amount;
                $return['detail'][$record->currency]['conversion'] = $record->conversion;
            } else {
                $return['detail'][$record->currency]['sum_amount'] += $record->amount;
                $return['detail'][$record->currency]['conversion'] += $record->conversion;
            }

            $return['detail'][$record->currency]['lists'][] = [
                'id' => $record->id,
                'company_id' => $record->company_id,
                'pid' => $record->pid,
                'date' => $record->date,
                'amount' => $record->amount,
                'channel' => $record->channel,
                'currency' => $record->currency,
                'conversion' => $record->conversion,
                'exchange_rate' => $record->exchange_rate,
                'origin_amount' => $record->origin_amount,
            ];
        }


        dd($return);












        $res = $res->groupBy('currency');
        $_data[] = [];


        foreach ($res as $key => $value){
            foreach ($value as $k => $v) {
                $_amount = 0;
                $_conversion = 0;
                $amount = $_amount += $v['amount'];
                $conversion = $_conversion += $v['conversion'];
                $date = $v['date'];

                $_data[$date][$key]['amount'] = $amount;
                $_data[$date][$key]['conversion'] = $conversion;
            }

//            $_data[$key] += $value['amount'];
        }
        dd(
            $_data
        );
    }


    public function testwk() {
        $converter = new \wkhtmltox\PDF\Converter([
            "out" => "test.pdf"
        ]);

        $str = <<<'EOD'
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <style>
                @font-face {
                    font-family: myFirstFont;
                }
            
                body {
                    font-family: myFirstFont;
                }
            
            </style>
            <body>
                aljdakfjskfaklfkldjaskfljkajfksdjflkajlk
            </body>
            </html>
EOD;

        $converter->add(new \wkhtmltox\PDF\Object(
            $str));

        dd($converter->convert());
    }


    public function aa() {
        $post = Post::all();
        $res = $post->map(function ($post) {
            return $post->author->name;
        });
        dd($res);
    }

    public function bb() {
        $post = Post::with('author')->get();
        $res = $post->map(function ($post) {
            return $post->author->name;
        });
        dd($res);
    }


}
