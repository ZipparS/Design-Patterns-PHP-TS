<?php
/*
Consider, you are building a house and you need doors. 
You can either put on your carpenter clothes, bring some wood, 
glue, nails and all the tools required to build the door and 
start building it in your house or you can simply call the factory and 
get the built door delivered to you so that you don't need to learn 
anything about the door making or to deal with the mess that comes with making it.
*/

/////////////////////////////////////////////////////////////////////
// First of all we have a door interface and the implementation
/////////////////////////////////////////////////////////////////////
interface Door
{
    public function getWidth(): float;
    public function getHeight(): float;
}

class WoodenDoor implements Door
{
    protected $width;
    protected $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}

/////////////////////////////////////////////////////////////////////
// Then we have our door factory that makes the door and returns it 
/////////////////////////////////////////////////////////////////////
class DoorFactory
{
    public static function makeDoor($width, $height): Door
    {
        return new WoodenDoor($width, $height);
    }
}

/////////////////////////////////////////////////////////////////////
// And then it can be used as
/////////////////////////////////////////////////////////////////////

// Make me a door of 100x200
$door = DoorFactory::makeDoor(100, 200);

echo 'Width: ' . $door->getWidth();
echo 'Height: ' . $door->getHeight();

// Make me a door of 50x100
$door2 = DoorFactory::makeDoor(50, 100);

?>