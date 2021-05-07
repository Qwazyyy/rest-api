<?php
    interface Commit 
    {
        public function sendCommit();
    }

    class Alexey implements Commit 
    {
        public function sendCommit()
        {
            return "code1";
        }
    }

    class Evgeny 
    {
        public function consultWithAlexey()
        {
            if ($this->checkCode()) {
               return $this->sendCommit();
            }
        }

        private function checkCode()
        {
            return true;
        }

        private function sendCommit()
        {
            return "code2";
        }
    }

    class Adapter implements Commit
    {
        private $evgeny;

        public function __construct(Evgeny $evgeny)
        {
            $this->evgeny = $evgeny;
        }

        public function sendCommit()
        {
            return $this->evgeny->consultWithAlex();
        }
    }

    function phpstormSendCommit(Commit $commit)
    {
        echo $commit->sendCommit();
    }




    $commitAlex = new Alexey();
    
    phpstormSendCommit($commitAlex);


    $evgenyCommit = new Evgeny();
    $commitEvgeny = new Adapter($evgenyCommit);
    echo "\n";
    phpstormSendCommit($commitEvgeny);
    
    
