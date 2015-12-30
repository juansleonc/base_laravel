<?php


class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @return mixed
     */
    public function createUser()
    {
        return factory(App\User::class)->create([
            'name' => 'juan leon',
            'email' => 'juansleonc@gmail.com',
            'username' => 'juanleonx',
            'password' => bcrypt('qwerty123'),
            'role' => 'admin',
            'active' => 'false'
        ]);
    }

    public function seeInField($selector, $expected)
    {
        $current = $this->getInputOrTextareaValue($selector);

        $this->assertSame(
            $expected,
            $current,
            "The input [{$selector}] has not the value [{$expected}]"
        );
        return $this;
    }

    /**
     * @param string $selector
     * @return null|string
     * @throws \Exception
     */
    public function getInputOrTextareaValue($selector)
    {
        $field = $this->filterByNameOrId($selector);

        if ($field->count() == 0)
            throw new Exception("There are no elements with the name or ID [$selector]");

        $element = $field->nodeName();

        if ($element == 'input') {
            $current = $field->attr('value');
            return $current;
        } elseif ($element = 'textarea') {
            $current = $field->text();
            return $current;
        } else {
            throw new Exception("[$selector] is neither an input nor a textarea");
        }
    }
}
