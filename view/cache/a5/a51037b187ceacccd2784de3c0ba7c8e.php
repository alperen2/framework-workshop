<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_d491dfacfcb6a2a6eccab78a6c37cb53 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Framework</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css\">

  </head>
  <body>
    <div class=\"container\">
        <header class=\"d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom\">
        <a href=\"/\" class=\"d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none\">
            <svg class=\"bi me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>
            <span class=\"fs-4\">Framework</span>
        </a>

        <ul class=\"nav nav-pills me-5\">
            <li class=\"nav-item\"><a href=\"/\" class=\"nav-link active\" aria-current=\"page\">Home</a></li>
            ";
        // line 21
        if ((($context["username"] ?? null) == false)) {
            // line 22
            echo "                <li class=\"nav-item\"><a href=\"/auth/login\" class=\"nav-link\">Login</a></li>
                <li class=\"nav-item\"><a href=\"/auth/register\" class=\"nav-link\">Register</a></li>
            ";
        } else {
            // line 25
            echo "                <li class=\"nav-item\"><a href=\"/candidate/add\" class=\"nav-link\">Candidate ekle</a></li>
                <li class=\"nav-item\"><a href=\"/auth/logout\" class=\"nav-link\">Logout</a></li>
            ";
        }
        // line 28
        echo "        </ul>
        <span class=\"navbar-text\">
            <a href=\"\" class=\"nav-link\">";
        // line 30
        if (($context["username"] ?? null)) {
            echo " ";
            echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
            echo " ";
        }
        echo " </a>
        </span>
        </header>
        ";
        // line 33
        $this->displayBlock('content', $context, $blocks);
        // line 35
        echo "    </div>

    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz\" crossorigin=\"anonymous\"></script>
  </body>
</html>";
    }

    // line 33
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "        ";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  100 => 34,  96 => 33,  88 => 35,  86 => 33,  76 => 30,  72 => 28,  67 => 25,  62 => 22,  60 => 21,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/workspaces/framework-workshop/view/base.html.twig");
    }
}
