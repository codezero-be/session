<?php namespace spec\CodeZero\Session;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VanillaSessionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['key' => 'value']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CodeZero\Session\VanillaSession');
    }

    function it_gets_specific_session_data()
    {
        $this->get('key')->shouldReturn('value');
    }

    function it_gets_all_session_data()
    {
        $this->get()->shouldReturn(['key' => 'value']);
    }

    function it_returns_null_if_the_session_key_does_not_exist()
    {
        $this->get('unexisting key')->shouldReturn(null);
    }

    function it_stores_session_data()
    {
        $this->store('another key', 'another value');
        $this->get('another key')->shouldReturn('another value');
    }

    function it_replaces_session_data()
    {
        $this->store('key', 'different value');
        $this->get('key')->shouldReturn('different value');
    }

    function it_deletes_specific_session_data()
    {
        $this->get('key')->shouldReturn('value');
        $this->delete('key');
        $this->get('key')->shouldReturn(null);
    }

    function it_ignores_deletes_if_the_session_key_does_not_exist()
    {
        $this->get('key')->shouldReturn('value');
        $this->get('unexisting key')->shouldReturn(null);
        $this->delete('unexisting key');
        $this->get('key')->shouldReturn('value');
    }

    function it_deletes_all_session_data()
    {
        $this->get('key')->shouldReturn('value');
        $this->flush();
        $this->get('key')->shouldReturn(null);
    }

    function it_destroys_a_session_and_starts_a_new_one()
    {
        $this->get('key')->shouldReturn('value');
        $this->destroy();
        $this->get('key')->shouldReturn(null);
        $this->store('key', 'value');
        $this->get('key')->shouldReturn('value');
    }
}

namespace CodeZero\Session;

function session_start() { }
function session_unset() { }
function session_destroy() { }
function session_write_close() { }
function session_regenerate_id() { }
function setcookie() { }