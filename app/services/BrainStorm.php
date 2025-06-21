<?php
namespace App\services;

class BrainStorm
{
    public function __construct() {}
    public function standOutGrowd(Bool $smartWork, Bool $hardWork, array $valueOfLife):array
    {
        $return = [];
        if (empty($valueOfLife)) {
           $return[] =  "You must select at least one elixir.";
           return $return;
        }
        if ($smartWork && $hardWork) {
            $return[]= "You are on the right path to success!";
        } elseif (!$smartWork && !$hardWork) {
            $return[]= "You need to focus on both smart and hard work.";
        } elseif (!$smartWork && $hardWork) {
            $return[]= "Hard work is important, but don't forget to work smart.";
        } elseif ($smartWork && !$hardWork) {
            $return[]= "Smart work is great, but hard work is also necessary.";
        } elseif ($hardWork) {
            $return[]= "Hard work is essential for success.";
        } elseif ($smartWork) {
            $return[]= "Smart work is essential for efficiency.";
        } else {
            $return[]= "You need to choose a work type.";
        }

        foreach ($valueOfLife as $elixir) {
            try {
                $return[] = $elixir->getDescription() . " - Reward: " . $elixir->getReward();
            } catch (\InvalidArgumentException $e) {
                $return[] = "Error: " . htmlspecialchars($e->getMessage());
            }
        }

        return $return;
    }
}
