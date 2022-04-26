<?php

namespace Database\Seeds;

use Database\QueryInterface;

class CommentsSeed_3 implements QueryInterface
{

    public static function query(): string
    {
        return "INSERT INTO comments
                    (user_id,post_id,body,created_at)
                    VALUES
                    (1,1,'We go to a gallery every Sunday.
                    I recently lost $140 at the Casino in Cleveland because of multiple poor decisions on my part.
                    The door slammed down on my hand, and I screamed like a little baby.
                    Thats all!',NOW()),
                    (2,1,'She preferred Pages to Word but had to use Word for the people who didnt have Apple devices.
                    I trust you so much.
                    The baby threw up all over her new white dress.
                    Good heavens youve grown!',NOW()),
                    (1,1,'Tom wanted to live in a city like Boston.
                    Robert tends to talk big.
                    He cleaned my teeth really well.
                    There used to be a pine tree in front of my house.',NOW()),
                    (1,2,'I want to go there someday.
                    She writes an e-mail to her best friend.
                    The Avengers should start over.
                    It was a miracle: the Trader Joes cashier let her check out in peace.',NOW()),
                    (2,2,'Spiderman and Iron Man are two great men.
                    She was constantly looking for new jobs.
                    I like furry animals.
                    What is it?',NOW()),
                    (1,2,'She had a water bottle with  a built-in water filter.
                    I hope the dog doesnt slobber on me.
                    He is my elder brother.
                    You must be happy.',NOW()),
                    (2,3,'The bigger they are, the harder they fall.
                    I agree it’s not bad to steal from a convenience store.
                    I wanted to flirt with the barista, but suddenly, I couldnt find my tongue.
                    Hurry up, slowpoke!',NOW()),
                    (1,3,'We are coming up to it.
                    Tom is just a farm boy living in a big city.
                    They rode their respective bikes.
                    The dog barked at the cat.',NOW()),
                    (2,3,'Life is full of ups and downs.
                    Two big powers have signed a secret agreement.
                    It’s as flat as a pancake.
                    That would be a really big surprise, wouldnt it?',NOW()),
                    (1,4,' you are in your thirties you actually read Hegel, because you only pretended to read him in your twenties.
                    A small town lies between the big cities.
                    The tables were made of fake wood.
                    Laken bought a computer at thirty percent off the list price.',NOW()),
                    (2,4,'There were seven balloons at the store.
                    The baby was in a parka in the stroller.
                    Skating is so much fun.
                    The alligators teeth were so scary that I ran back to the car as fast as I could.',NOW()),
                    (1,4,'I found a gold coin on the playground after school today.
                    Workers will not be empowered.
                    The train was forty-seven minutes late.
                    The President is back.',NOW()),
                    (2,5,'He was a slow-moving man.
                    The advanced technology is what sold me.
                    He does laundry in his basement.
                    That’s right, and dont you ever forget it!',NOW()),
                    (1,5,'Im on the list.
                    He has quite a few friends.
                    I made a big mistake when choosing my wife.
                    What a big truck!',NOW()),
                    (2,5,'I have a bunch of things I need to do.
                    Nobody ever believed her when she told them how big her family was.
                    Many big projects will be completed in the 21st century.
                    Stand up and catch that ball!',NOW())";
    }

}