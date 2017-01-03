<?php
namespace spec\Netsensia\Usernames;

include "spec/SpecHelper.php";

use PhpSpec\ObjectBehavior;

class GeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Netsensia\Usernames\Generator');
    }
    
    function it_can_generate_usernames_with_requested_part_counts()
    {
        $this->generate(1)->shouldBeAUsernameWithPartCount(1);
        $this->generate(2)->shouldBeAUsernameWithPartCount(2);
        
        for ($i=0; $i<5000; $i++) {
            // check for unforeseen edge cases
            $this->generate(3)->shouldBeAUsernameWithPartCount(3);
        }

        $this->generate(0)->shouldBeAUsernameWithPartCount(1);
        $this->generate(4)->shouldBeAUsernameWithPartCount(3);
    }
    
    public function getMatchers()
    {
        return [
            'beAUsernameWithPartCount' => function ($subject, $numberOfParts) {
                $split = explode(' ', $subject);
                if (count($split) != $numberOfParts) {
                    return false;
                }
                foreach ($split as $part) {
                    if (strlen($part) < 2) {
                        return false;
                    }
                    if (!ctype_alpha($part)) {
                        return false;
                    }
                }
                return true;
            },
        ];
    }
}
