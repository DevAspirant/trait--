<?php 
/* 
* Traints هو عبارة عن حل لمشكلة وراثة اكثر من كلاس 
* يتم استخدامه عن طريق الكلمة المفتاحية trait 
* يتم تفيلها عن طريق الكلمة المفتاحية use 
* لاحظت وجودها داخل الكلاس 
 */

trait Test {
    protected function hello(){
        echo 'Hello from trait';
    }
    protected function sayWelcome(){
        echo 'welcome to our service';
    }

    protected function markLine(){
        echo '<hr>';
    }
}

trait Test2{
    public function welcome(){
        echo 'welcome to trait 2';
    }
}

trait ParentTrait{
    use Test{
        Test::hello as public;
    }
}

class ParentClass {
    public function hello(){
        echo 'hello from the parent class';
    }
}

class ChildClass extends ParentClass{
    use Test2,ParentTrait;
    public function callWelcome(){
        return $this->sayWelcome();
    }

    public function call_mark_line(){
        return $this->markLine();
    }
}

(new ChildClass())->hello();
(new ChildClass())->call_mark_line();
(new ChildClass())->welcome();
?>
