<?php

namespace Database\Seeds;

use Database\QueryInterface;

class PostsSeed_2 implements QueryInterface
{

    public static function query(): string
    {
        return "INSERT INTO posts
            (id,user_id,title,description,created_at)
            VALUES
            (1,1,'Managed intangible success',
            'Workers will still have to work in order to live and pay their landlords for shelter.
            Your mom is so nice for giving me a ride home today.
            I want to learn all of the words in the dictionary by July.
            She didnt know how much more of this she could take before she snapped.
            The chickens were running around and pecking worms out of the ground.
            I want racecars to be legal for average people.
            Do you consider yourself a liberal or a conservative?
            Canada is really big and there are lots of people.',ADDDATE(NOW(), INTERVAL -1 day )),
            (2,2,'Quality-focused real-time project','He made tuna noodle casserole for their first anniversary dinner, not realizing she found it disgusting.
            She liked online dating apps because they didnt require you to meet people in-person.
            They had been dating for seven years by the time they got engaged.
            She didnt know what else she could have done.
            He had always thought that the back of cars looked like faces.
            Sometimes she absolutely loved falafel, but other times just the thought of it made her stomach turn.
            Lets all just take a moment to breathe, please!
            He wanted to give his boyfriend a hug, but he was in Slovakia.',ADDDATE(NOW(), INTERVAL -2 day )),
            (3,1,'Centralized leading edge architecture','The Ferris Wheel was invented in Chicago for the Worlds Fair in 1893.
            Im left wondering if she understood the joke.
            Tom stood alone under a clock in the deserted train station.
            The wind was so strong it swept her hat right away.
            Do not sign a delivery receipt unless it accurately lists the goods received.
            He was very excited to see her, after two months away.
            Democracy over what we work on is called socialist ',ADDDATE(NOW(), INTERVAL -3 day )),
            (4,1,'Switchable solution-oriented emulation','We need a car big enough for the whole family.
            She wanted to be a professor when she was in high school, but then she realized how few academic jobs there are on the market.
            Our competitors dont normally ask us for advice, but when an airline leader reached out, we couldnt ignore it.
            Dozens of houses were burned down in that big fire.
            She came up behind him when he was on the phone.
            My mom drove me to school fifteen minutes late on Tuesday.
            Did you hear about the big earthquake in Japan?
            That would be a really big surprise, wouldnt it?',ADDDATE(NOW(), INTERVAL -4 day )),
            (5,2,'Multi-layered 4th generation challenge','My home is bright pink and has yellow flowers growing all around it.
            I was excited to spend time with my wife without being interrupted by kids.
            There is nothing about the situation I could relate to.
            Our teacher often overlooked his name on the list.
            Our competitors dont normally ask us for advice, but when an airline leader reached out, we couldnt ignore it.
            She was wearing a pink shirt with white polka dots and a green headband.
            Lets all just take a moment to breathe, please!
            She only paid six dollars for it, then sold it online for forty-two.',ADDDATE(NOW(), INTERVAL -5 day ))";
    }

}