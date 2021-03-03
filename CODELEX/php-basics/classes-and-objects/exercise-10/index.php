<?php
require_once 'Video.php';
require_once 'VideoStore.php';

class Application
{
    function __construct(VideoStore $store)
    {
        $this->store = $store;
    }

    public function run(): string
    {
        echo print("\033[2J\033[;H");
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!" . PHP_EOL;
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(): void
    {
        $title = readline('Enter title:' . PHP_EOL);
        $this->store->addMovie($title, true, 50, date("d/m/Y"), '', 0);
    }

    private function rentVideo(): void
    {
        $name = readline('Enter video title: ' . PHP_EOL);
        $this->store->rentVideo($name);
    }

    private function returnVideo(): void
    {
        $name = readline('Enter video title to return: ' . PHP_EOL);
        $rating = (int) readline('Enter your rating 1 - 100: ' . PHP_EOL);
        $this->store->return($name, $rating);
    }

    private function listInventory(): void
    {
        $this->store->getAllVideos();
    }
}

$store = new VideoStore();
$store->addVideo(new Video('The Matrix', true, 50, '01.03.21', '02.03.21', 0));
$store->addVideo(new Video('Godfather II', false, 50, '21.01.21', '', 0));
$store->addVideo(new Video('Star Wars Episode IV:A New Hope', true, 50, '21.01.21', '23.01.21', 0));

$app = new Application($store);
$app->run();
