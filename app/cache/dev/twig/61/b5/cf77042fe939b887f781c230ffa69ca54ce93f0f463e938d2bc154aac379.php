<?php

/* StarWarsBundle:Temple:show.html.twig */
class __TwigTemplate_61b5cf77042fe939b887f781c230ffa69ca54ce93f0f463e938d2bc154aac379 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <p>Bienvenue dans le temple ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["temple"]) ? $context["temple"] : $this->getContext($context, "temple")), "color"), "html", null, true);
        echo " :)</p>
";
    }

    public function getTemplateName()
    {
        return "StarWarsBundle:Temple:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
