/*
Consider, you are building a house and you need doors. 
You can either put on your carpenter clothes, bring some wood, 
glue, nails and all the tools required to build the door and 
start building it in your house or you can simply call the factory and 
get the built door delivered to you so that you don't need to learn 
anything about the door making or to deal with the mess that comes with making it.

In plain words:

Simple factory simply generates an instance for client without exposing any instantiation logic to the client
*/

/////////////////////////////////////////////////////////////////////
// First of all we have a door interface and the implementation
/////////////////////////////////////////////////////////////////////

interface Door {
    width: number;
    height: number;

    /**public*/getWidth(): number;
    /**public*/getHeight(): number;
}

class WoodenDoor implements Door {
    width:  number
    height: number

    constructor(width: number, height: number) {
        this.width = width;
        this.height = height;
    }

    public getWidth(): number {
        return this.width
    }

    public getHeight(): number {
        return this.height
    }
}

/////////////////////////////////////////////////////////////////////
// Then we have our door factory that makes the door and returns it 
/////////////////////////////////////////////////////////////////////
class DoorFactory {
    public static makeDoor(width: number, height: number): Door {
        return new WoodenDoor(width, height)
    }
}

/////////////////////////////////////////////////////////////////////
// And then it can be used as
/////////////////////////////////////////////////////////////////////

// Make me a door of 100x200
const door = DoorFactory.makeDoor(100, 200);

console.log(door.getWidth())
console.log(door.getHeight())

// Make me a door of 50x100
const door2 = DoorFactory.makeDoor(50, 100);