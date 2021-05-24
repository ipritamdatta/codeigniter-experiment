<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;

class CustomModel{

    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }

    function all()
    {
        // "SELECT * FROM posts"
        return $this->db->table('posts')->get()->getResult();
    }

    function where()
    {
        return $this->db->table('posts')
                        ->where(['post_id >' => 2])
                        ->where(['post_id <' => 7])
                        ->where(['post_id !=' => 5])
                        ->orderBy('post_id', 'DESC')
                        ->get()
                        ->getRow();
    }

    function join()
    {
        return $this->db->table('posts')
                 ->where('post_id >',3)
                 ->where('post_id <',7)
                 ->join('users','posts.post_author = users.user_id')
                 ->get()
                 ->getResult();
    }

    function like()
    {
        return $this->db->table('posts')
                    ->like('post_content','new', 'both') //both = %string%, before = %string, after = string%
                    ->join('users','posts.post_author = users.user_id')
                    ->get()
                    ->getResult();
    }

    function grouping()
    {
        // SELECT * FROM posts where (post_id = 25 AND post_created_at < '2022-5-20 00:00:00') OR post_author = 2;
        return $this->db->table('posts')
                        ->groupStart()
                            ->where(['post_id >' => '5', 'post_created_at <' => '2022-5-20 00:00:00'])
                        ->groupEnd()
                        ->orWhere('post_author',4)
                        ->get()
                        ->getResult();
    }

    public function wherein()
    {
        $emails = ['ishuvprit@gmail.com','aurelia15@yahoo.com','myron.schultz@yahoo.com'];
        return $this->db->table('posts')
                        ->groupStart()
                            ->where(['post_id' => '25', 'post_created_at <' => '2022-5-20 00:00:00'])
                        ->groupEnd()
                        ->orWhereIn('user_email',$emails)
                        ->join('users','posts.post_author = users.user_id')
                        ->limit(5,2)
                        ->get()
                        ->getResult();
    }

    function getPosts()
    {
        $builder = $this->db->table('posts');
        $builder->join('users','posts.post_author = users.user_id');
        $posts = $builder->get()->getResult();

        return $posts;
    }
}