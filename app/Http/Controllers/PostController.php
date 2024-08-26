<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    // public function index()
    // {
    //     return "Post controller: index method";
    // }

    public function viewPost($post_id)
    {
        return "Post Controller: This is Post ID: $post_id";
    }

    // public function viewUserPost($username, $post_id)
    // {
    //     return "Post #$post_id: This is the post of $username.";
    // }

    # Act 1
    // public function show($username)
    // {
    //     return "Hello " . strtoupper($username) . "!";
    // }


    # Using View
    public function viewAllPosts()
    {
        $post_titles = [
            'Python vs Java',
            'The Cloud',
            'How To Stay Productive',
            'Coding during pandemic'
        ];

        return view('view-all')
            ->with('post_titles', $post_titles);
    }

    # View Passing Data
    public function viewUserPost($username, $post_id)
    {
        // daisy chain the data using with()
        // with('key', value)
        return view('view-post')
            ->with('key_post_id', $post_id)
            ->with('key_username', $username);
    }


    # Act2
    // public function show($username)
    // {
    //     $post_titles = [
    //         'How to Make French Toast',
    //         'Japanese Cheesecake Recipe',
    //         'How to Cook Steak',
    //         'The Best Places in Tokyo for Shoku-pan Bread',
    //         'Cambodian Style Fried Chicken Wings'
    //     ];

    //     return view('show')
    //     ->with('post_titles', $post_titles)
    //     ->with('username', ucwords($username));
    // }


    /**************** ELOQUENT *****************/

    # CREATE
    public function save()
    {
        // Create an object of the model/class Post
        // $post = new Post;

        $this->post->title = "Laravel 11 Release";
        $this->post->content = "This is the latest version of Laravel";
        # eloquent save()
        $this->post->save();

        return "saved!";
    }

    public function create()
    {
        // Create an object of the model/class Post
        // $post = new Post;

        $new_post = [
            'title' => 'Hello World!',
            'content' => "It's a good day. I'm learning Laravel."
        ];
        # eloquent create()
        $this->post->create($new_post);

        return "created!";
    }


    # READ (all)
    public function index()
    {
        // $post_m = new Post;
        // eloquent all() - retrieves all of the records from the model.
        $all_posts = $this->post->all();
        // SELECT * FROM posts;

        foreach ($all_posts as $post) {
            echo "ID: " . $post->id . "<br>";
            echo "Title: " . $post->title . "<br>";
            echo "Content: " . $post->content;
            echo "<hr>";
        }
    }

    # READ (find)
    // public function show($post_id)
    // {
    //     $post_m = new Post;
    //     eloquent find() - retrieves a single record by its primary key.
    //     eloquent findOrFail() - does the same but will throw a NotFoundException if no result is found.
    //     $post = $this->post->findOrFail($post_id);
    //     $post holds now the record of the retrieved post.

    //     echo "ID: " . $post->id . "<br>";
    //     echo "Title: " . $post->title . "<br>";
    //     echo $post->content;
    // }


    # READ (where)
    public function showWhere($post_id)
    {
        // $post_m = new Post;

        // where(column name, value)
        // get() - retrieves the results
        # URLの{post_id}部分にDBに存在しない番号を入力した場合、エラーでなく真っ白な画面になる
        // $post = $this->post->where('id', $post_id)->get();

        // get()でなくfirst()で取得した場合の結果はcollectionでないのでforeach不要
        // $post = $this->post->where('id', $post_id)->first();
        // var_dump($post); #Deb

        // latest() - orders the results by date

        // where(column name, operator, value)
        // $post= $this->post->where('id', '>=', $post_id)->latest()->get();

        // orderBy(column name, order) - 'ABC' or 'DESC' for order
        // take() - limits the number of results
        $post = $this->post->orderBy('title', 'DESC')->take(3)->get();

        // WHERE (id > $post_id)とした場合、結果は複数になる(正確にはなり得る)
        foreach ($post as $p) {
            echo "ID: " . $p->id . "<br>";
            echo "Title: " . $p->title . "<br>";
            echo $p->content;
            echo "<hr>";
        }
    }

    # UPDATE
    public function update($post_id)
    {
        // $post_m = new Post;

        $post = $this->post->findOrFail($post_id);
        $post->title = "New Title";
        $post->content = "New Content";
        $post->save();

        return "Updated successfully!";
    }

    # DELETE
    public function delete($post_id)
    {
        // $post_m = new Post;
        // delete() needs this step
        $post = $this->post->findOrFail(($post_id));

        $post->delete(); // delete() takes no arguments.

        return "deleted successfully!";
    }

    public function destroy($post_id)
    {
        // $post_m = new Post;
        // This is all that is required for destroy().
        $this->post->destroy($post_id);

        return "Destroyed Successfully!";
    }


    // One to Many
    public function show($post_id)
    {
        $post = $this->post->findOrFail($post_id);

        return view('posts.show')
            ->with('post', $post);
    }
}
