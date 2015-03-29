<?php namespace spec\CodeZero\Session;

use Illuminate\Contracts\Foundation\Application;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LaravelSessionServiceProviderSpec extends ObjectBehavior
{
    function let(Application $app)
    {
        $this->beConstructedWith($app);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CodeZero\Session\LaravelSessionServiceProvider');
    }

    function it_binds_the_laravel_session_implementation(Application $app)
    {
        $app->singleton('CodeZero\Session\Session', 'CodeZero\Session\LaravelSession')->shouldBeCalled();
        $this->register();
    }
}
