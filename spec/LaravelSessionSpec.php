<?php namespace spec\CodeZero\Session;

use Illuminate\Session\Store;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LaravelSessionSpec extends ObjectBehavior
{
    function let(Store $session)
    {
        $this->beConstructedWith($session);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CodeZero\Session\LaravelSession');
    }

    function it_gets_specific_session_data(Store $session)
    {
        $session->get('key')->shouldBeCalled()->willReturn('value');
        $this->get('key')->shouldReturn('value');
    }

    function it_gets_all_session_data(Store $session)
    {
        $session->all()->shouldBeCalled()->willReturn('all data');
        $this->get()->shouldReturn('all data');
    }

    function it_returns_null_if_the_session_key_does_not_exist(Store $session)
    {
        $session->get('unexisting key')->shouldBeCalled()->willReturn(null);
        $this->get('unexisting key')->shouldReturn(null);
    }

    function it_stores_session_data(Store $session)
    {
        $session->put('key', 'value')->shouldBeCalled();
        $this->store('key', 'value');
    }

    function it_deletes_specific_session_data(Store $session)
    {
        $session->forget('key')->shouldBeCalled();
        $this->delete('key');
    }

    function it_deletes_all_session_data(Store $session)
    {
        $session->flush()->shouldBeCalled();
        $this->flush();
    }

    function it_destroys_a_session_and_starts_a_new_one(Store $session)
    {
        $session->flush()->shouldBeCalled();
        $session->regenerate()->shouldBeCalled();
        $this->destroy();
    }
}
