<?php 
namespace Layerup\Tema\Controllers;

use Layerup\Tema\Models\Post;

/**
 * Class responsible for defining which templates should be loaded.
 */
class TemplatesController{
    /**
     * The template folder name. Created so there is no
     * need to use the long name.
     */
    private const TEMPLATE = LAYERUP_THEME_TEMPLATES_ROOT;

    /**
     * Constructor method. Decides which template to load.
     */
    public function __construct(){
        //Testing for home.
        if(is_front_page() || is_home()){
            $this->load_home();
        }
    }

    /**
     * Loads the website home.
     */
    private function load_home(){
        //getting all posts and sending them to the Model.
        $posts = PostsController::get_all();

        //Turning the posts into models.
        $usable_posts = array();

        foreach($posts as $single_post){
            $usable_posts[] = new Post($single_post);
        }

        $this->load_navbar();

        get_template_part(
            self::TEMPLATE . '/grids/posts',
            null,
            array($usable_posts)
        );

        $this->load_footer();
    }

    /**
     * Loads the website navbar.
     */
    private function load_navbar(){
        $path = self::TEMPLATE . '/common/navbar';
        get_template_part($path);
    }

    /**
     * Loads the website footer.
     */
    private function load_footer(){
        $path = self::TEMPLATE . '/common/footer';
        $args = array(
            date('Y'),
        );

        get_template_part($path,null,$args);
    }
} 