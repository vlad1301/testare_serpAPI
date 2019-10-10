<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use RestClient;
use RestClientException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $search_key=$request->cuvant_cheie;
        $search_engine=$request->motor_cautare;
        $se_language=$request->limba;
        $loc_name_canonical="Bucharest,Romania";


        require('C:\xampp\htdocs\9_oct\test\resources\files\RestClient.php');
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip

        try {
            //Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/login
            $client = new RestClient('https://api.dataforseo.com/', null, 'cozmutavlad@yahoo.com', 'EEX3NeUe4OI1raLD');
        } catch (RestClientException $e) {
            echo "\n";
            print "HTTP code: {$e->getHttpCode()}\n";
            print "Error code: {$e->getCode()}\n";
            print "Message: {$e->getMessage()}\n";
            print  $e->getTraceAsString();
            echo "\n";
            exit();
        }

        $post_array = array();

       /* $search_engine="google.ro";
        $se_language="Romanian";
        $loc_name_canonical="Bucharest,Romania";
        $search_key=$vlad;*/

        $my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
        $post_array[$my_unq_id] = array(
            "se_name" => $search_engine,
            "se_language" => $se_language,
            "loc_name_canonical"=> $loc_name_canonical,
            "key" =>  mb_convert_encoding($search_key, "UTF-8")
        );

        try {
            // POST /v2/live/srp_tasks_post/$data
            // $tasks_data must by array with key 'data'
            $result = $client->post('v2/live/srp_tasks_post', array('data' => $post_array));

            print_r( $result);

            //do something with post results

            $post_array = array();
        } catch (RestClientException $e) {
            echo "\n";
            print "HTTP code: {$e->getHttpCode()}\n";
            print "Error code: {$e->getCode()}\n";
            print "Message: {$e->getMessage()}\n";
            print  $e->getTraceAsString();
            echo "\n";
        }

        $client = null;




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
