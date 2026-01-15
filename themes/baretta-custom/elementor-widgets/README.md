# Elementor Custom Widgets

Questa cartella contiene i widget custom per Elementor.

## Come Creare un Nuovo Widget

1. Crea un nuovo file PHP in questa cartella (es. `my-widget.php`)
2. Usa la struttura dell'esempio `example-widget.php`
3. Modifica i seguenti metodi:
   - `get_name()` - Nome univoco del widget
   - `get_title()` - Titolo visibile in Elementor
   - `get_icon()` - Icona (vedi https://elementor.github.io/elementor-icons/)
   - `register_controls()` - Controlli del widget
   - `render()` - Output HTML del widget

## Documentazione

- [Elementor Developer Docs](https://developers.elementor.com/)
- [Creating Custom Widgets](https://developers.elementor.com/docs/widgets/)
- [Controls Reference](https://developers.elementor.com/docs/controls/)

## Esempi di Widget Utili

### Widget Hero Section
```php
$this->add_control('background_image', [
    'label' => __('Background Image', 'baretta-custom'),
    'type' => \Elementor\Controls_Manager::MEDIA,
]);
```

### Widget Call to Action
```php
$this->add_control('button_link', [
    'label' => __('Link', 'baretta-custom'),
    'type' => \Elementor\Controls_Manager::URL,
]);
```

### Widget Testimonials
```php
$this->add_control('testimonials', [
    'label' => __('Testimonials', 'baretta-custom'),
    'type' => \Elementor\Controls_Manager::REPEATER,
]);
```

## Tips

- Tutti i file .php in questa cartella vengono caricati automaticamente
- Usa la categoria 'baretta-custom' per raggruppare i tuoi widget
- Sanitizza sempre l'output con `esc_html()` o `wp_kses_post()`
- Testa i widget in anteprima live di Elementor
