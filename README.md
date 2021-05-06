<?php
    interface Commit 
    {
        public function sendCommit();
    }

    class Alex implements Commit 
    {
        public function sendCommit()
        {
            return "code1";
        }
    }

    class Evgen 
    {
        public function consultWithAlex()
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
        private $evgen;

        public function __construct(Evgen $evgen)
        {
            $this->evgen = $evgen;
        }

        public function sendCommit()
        {
            return $this->evgen->consultWithAlex();
        }
    }

    function phpstormSendCommit(Commit $commit)
    {
        echo $commit->sendCommit();
    }




    $commitAlex = new Alex();
    
    phpstormSendCommit($commitAlex);


    $evgenCommit = new Evgen();
    $commitEvgen = new Adapter($evgenCommit);
    echo "\n";
    phpstormSendCommit($commitEvgen);
    
    
