<?php

/* StarWarsBundle:Temple:list.html.twig */
class __TwigTemplate_5ae4ccf142cee92a8fb2c18c06e2040ec72fc3814f9e56e3c2d7587cb5960f3b extends Twig_Template
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
        echo "    <p>Liste des temples :</p>
    <ul>
        ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["temples"]) ? $context["temples"] : $this->getContext($context, "temples")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["temple"]) {
            // line 7
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("star_wars_temple_show", array("id" => $this->getAttribute((isset($context["temple"]) ? $context["temple"] : $this->getContext($context, "temple")), "id"))), "html", null, true);
            echo "\">Voir le temple ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["temple"]) ? $context["temple"] : $this->getContext($context, "temple")), "color"), "html", null, true);
            echo "</a></li>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 9
            echo "            <li>Y'a pas de temple, mon pote.</li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['temple'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "StarWarsBundle:Temple:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 11,  50 => 9,  40 => 7,  35 => 6,  31 => 4,  28 => 3,);
    }
}
