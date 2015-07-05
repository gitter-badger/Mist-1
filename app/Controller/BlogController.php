<?php

use Mist\Core\Controller\Controller;

/*
 * Blog Controller 
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 0.1
 * @date June 18th, 2015
 */

class BlogController extends Controller
{

    /**
     * Index action
     * Show all blog posts
     */
    public function index()
    {
        $blog = new Blog();
        $params = array(
            'blogs' => $blog->findAll()
        );
        $this->setParams('params', $params);
        $this->render();
    }
    /*
     * View specific post
     */
    public function view($query)
    {
        $blog = new Blog();
        $params = array(
            'blog' => $blog->find($query[0])
        );
        $this->setParams('params', $params);
        $this->render();
    }
}
