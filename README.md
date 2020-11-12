# Installation

Install the package via composer:

```
composer require nh/bs-component
```

Add this to your packages.json

```
"bootstrap" : "^5.0.0-alpha2",
"popper.js" : "^1.12",
"quill" : "^1.3.6",
"bs-custom-file-input" : "^1.3.4",
"flatpickr" : "^4.6.3"
```

Publish the config

```
php artisan vendor:publish --tag=bs-component
```

Javascript to include

```
require('../../vendor/nh/bs-component/resources/js/bs-component');
```

SASS to include

```
@import '../../vendor/nh/bs-component/resources/sass/bs-component';
```

Available components:

- [X] Alert
- [X] Blockquote
- [X] Breadcrumb
- [X] Card
- [X] Figure
- [X] Loading (Spinner)
- [X] Modal
- [X] Modal Confirm
- [X] Progress
- [X] Toast
- [X] Check (checkbox, radio or switch)
- [X] Checklist (list of checkbox or radio)
- [X] Datepicker
- [X] Dynamic input
- [X] Editor
- [X] Input
- [X] Input file
- [X] Select
- [X] Textarea

# Components

## Alert

| Attribute | Type | Default |
| --------- | ---- | ------- |
| color     | string | primary |           
| closable | boolean | false |

```
<x-bs-alert color="success" closable>
  Hey this is an alert !
</x-bs-alert>
```

## Blockquote

| Attribute | Type | Default |
| --------- | ---- | ------- |
| source    | string | null  |           
| align     | string | left  |

```
<x-bs-blockquote source="Natacha Herth" align="right">
  Hey this a blockquote !
</x-bs-blockquote>
```

## Breadcrumb

| Attribute | Type | Default |
| --------- | ---- | ------- |
| items     | array | null   |           

*The keys in array are used to display the link text and the values are used for the href. The values can be an url or a route name.*

```
<x-bs-breadcrumb :items="['First' => 'home', 'Seconde' => '#','Third' => null,'Fourth' => '#']"/>
```

## Card

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string | null  |
| footer    | string | null  |           

*The title and the footer can also be set as slot.*

```
<x-bs-card title="My card title" footer="My card footer">

  <x-slot name="before">
    Before the card body.
  </x-slot>

  Hey this a card !

  <x-slot name="after">
    After the card body.
  </x-slot>

</x-bs-card>
```

## Figure

| Attribute | Type | Default |
| --------- | ---- | ------- |
| caption   | string | null  |
| align     | string | left  |           

*The align is for the caption.*

```
<x-bs-figure caption="My caption" align="right">
  <img src="https://fakeimg.pl/250x100/cccccc/">
</x-bs-figure>
```

## Loading

| Attribute | Type | Default |
| --------- | ---- | ------- |
| type      | string | border |
| color     | string | primary |   
| title     | string | Loading... |    
| size      | string | md |           

*The default title is the 'bs-component::button.loading' translation.*

```
<x-bs-loading type="grow" color="success" title="Custom loading text" size="sm"/>
```

## Modal

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string | null  |
| footer    | string | null  |   
| size      | string | md    |   
| closable  | boolean | false |
| centered  | boolean | false |  
| scrollable | boolean | false |    
| is-static | boolean | false |
| fullscreen | boolean | false |      
| fullscreen-size | string | null |

```
<x-bs-modal id="myModal" title="My modal" footer="The footer of the modal" size="sm" closable centered  scrollable is-static fullscreen fullscreen-size="md">
  Hey this a modal !
</x-bs-modal>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Launch modal
</button>
```

## Modal Confirm

| Attribute | Type | Default |
| --------- | ---- | ------- |
| color     | string | primary |
| icon      | string | null  |
| title     | string | null  |
| action    | string | #     |
| method    | string | POST  |
| footer    | string | null  |   
| size      | string | md    |   
| centered  | boolean | false |  
| scrollable | boolean | false |    
| fullscreen | boolean | false |      
| fullscreen-size | string | null |
| btn-cancel | array | [] |
| btn-confirm | array | [] |

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_modal-confirm');```
- SASS: ```@import '../../vendor/nh/bs-component/resources/sass/modal-confirm';
```

*The action can be overide by the data-action attribute in the link*

```
<x-bs-modal-confirm id="myModalConfirm" color="danger" icon="icon-trash" title="My modal confirm" action="default.action" method="DELETE" size="md" centered >
  <p>Hey this a modal for confirmation !</p>
</x-bs-modal>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalConfirm" data-action="custom.action">
  Launch modal confirm
</button>
```

## Customization

You can globaly customize the buttons in the 'bs-component' config file.
Or you can set an array with the custom values (class,label,value) for each button.

```
<x-bs-modal-confirm :btnConfirm="['class' => 'btn-success','label' => 'my.translation.path','value' => '<i class=icon-checkmark></i>']">
  Hey this a modal for confirmation !
</x-bs-modal>
```

## Progress

| Attribute | Type | Default |
| --------- | ---- | ------- |
| color     | string | primary |
| value     | int  | 0       |   
| min       | int  | 0       |   
| max       | int  | 0       |   
| caption   | string | null  |
| stripped  | boolean | false |
| animated  | boolean | false |

```
<x-bs-progress color="success" value="25" min="0" max="100" caption="You got 25" stripped animated/>
```

## Toast

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string | null |
| time      | string | null |
| img       | string | null |
| closable  | boolean | false |
| autohide  | boolean | false |
| delay     | int    | 10000 |

```
<x-bs-toast class="show" title="My toast" time="11 min ago" img="https://fakeimg.pl/20x20/007bff/fff" closable autohide delay="100">
  Hey this is a toast !
</x-bs-toast>

<x-bs-toast class="show" time="11 min ago" img="https://fakeimg.pl/20x20/007bff/fff" closable autohide delay="100">
  Hey this is a toast !
</x-bs-toast>
```

# Form Components

All the component manage the request old() value and the validation.

## Check

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| type      | string | checkbox |
| name      | string |       |
| value     | string | 1     |
| help      | string | null  |
| checked   | boolean | false  |
| disabled  | boolean | false  |
| required  | boolean | false  |
| boolean   | boolean | false  |

*The name is required.*
*If the boolean option is set to true, a hidden input with the value opposite value is created.*

```
<x-bs-check label="Boolean checkbox" type="checkbox" name="boolean" boolean required/>
<x-bs-check class="form-switch" label="Boolean switch" type="checkbox" name="switch" boolean />

<x-bs-check label="My check one" type="checkbox" name="checkbox[]" value="one" help="Help message." checked />
<x-bs-check label="My check two" type="checkbox" name="checkbox[]" value="two"/>
<x-bs-check label="My check three" type="checkbox" name="checkbox[]" value="three" disabled />

<x-bs-check label="My radio one" type="radio" name="radio" value="one" help="Help message." checked />
<x-bs-check label="My radio two" type="radio" name="radio" value="two" />
<x-bs-check label="My radio three" type="radio" name="radio" value="three" help="Help message." disabled />
```

## CheckList

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| type      | string | checkbox |
| name      | string |       |
| options   | array  |       |
| help      | string | null  |
| checked   | string/array | [] |
| disabled  | boolean/array | false  |
| required  | boolean | false  |

*The name and the options are required.*
*You can pass an array with the disabled values or disabled them all.*

```
<x-bs-check-list label="My label" type="checkbox" name="fieldname[]" :options="[1 => 'one', 2 => 'two']" help="Help message" :checked="[2]" disabled required />
```

## Input

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| type      | string | text  |
| name      | string |       |
| value     | string | null  |
| placeholder | string | null  |
| help      | string | null  |
| size      | string | null  |
| readonly  | boolean | false |
| disabled  | boolean | false |
| required  | boolean | false |
| input-group | boolean | false |
| step      | float | 1 |
| min       | float | null |
| max       | float | null |

*The name is required.*
*The step, min and max are only for input of type number.*

```
<x-bs-input label="My input" type="text" name="myinput" value="Default value" placeholder="My placeholder" help="Help message" size="lg" readonly disabled required />

<x-bs-input label="My input group" type="text" name="myinputgroup" value="Default value" placeholder="My placeholder" help="Help message" input-group>
  <x-slot name="before">
    <div class="input-group-prepend">
       <span class="input-group-text">@</span>
    </div>
  </x-slot>
  <x-slot name="after">
    <div class="input-group-append">
       <span class="input-group-text">@</span>
    </div>
  </x-slot>
</x-bs-input>
```


## Input File

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| name      | string |       |
| placeholder | string | null  |
| button    | string | null  |
| help      | string | null  |
| size      | string | null  |
| disabled  | boolean | false |
| required  | boolean | false |
| input-group | boolean | false |

*The name is required.*
*The button option is for Bootstrap V5 only.*
*The default placeholder and button are the 'bs-component::button.choose-file' and 'bs-component::button.browse' translations.*

```
<x-bs-input-file label="My input file" name="myinput" placeholder="Choose a file" button="Browse" help="Help message" size="lg" disabled required />
```

## Select

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| name      | string |       |
| options   | array  |       |
| help      | string | null  |
| size      | string | null  |
| selected  | string/array | [] |
| multiple  | boolean | false |
| disabled  | boolean/array | false  |
| required  | boolean | false |
| input-group | boolean | false |

*The name and the options are required.*
*You can pass an array with the disabled values or disabled them all.*

```
<x-bs-select label="My label" name="myinput" :options="[1 => 'one', 2 => 'two']" help="Help message" size="lg" :selected="[2]" multiple disabled required />
```

## Textarea

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| name      | string |       |
| value     | string | null  |
| placeholder | string | null  |
| help      | string | null  |
| readonly  | boolean | false |
| disabled  | boolean | false |
| required  | boolean | false |
| input-group | boolean | false |

*The name is required.*

```
<x-bs-textarea label="My label" name="mytextarea" value="Default value" placeholder="My placeholder" help="Help message" readonly disabled required />
```

# JS Component

## Datepicker

To use the datepicker you need to install the JS plugin **Flatpickr** !

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| name      | string |       |
| value     | string | null  |
| placeholder | string | null |
| help      | string | null  |
| size      | string | null  |
| readonly  | boolean | false |
| disabled  | boolean | false |
| required  | boolean | false |
| input-group | boolean | false |
| mode      | string | single |
| format    | string | datetime |
| min       | string | null  |
| max       | string | null  |
| min-input | string | null  |
| max-input | string | null  |

*The name is required.*
*You can set a min/max date or define by another input name (min-input/max-input).*
*The mode can be single, multiple or range.*
*The format can be datetime, datetime-short, date, time, time-short, db-datetime, db-date, db-time.*

```
<x-bs-datepicker label="Start date" name="startInputName" value="2020-05-04" placeholder="Select a date" help="Help message" size="lg" readonly disabled required mode="single" format="datetime" min="2020-05-01" max="2020-05-30"/>

<x-bs-datepicker label="End date" name="endInputName" mode="single" format="datetime" min-input="startInputName" />
```

## Dynamic

With this component you can add/remove input to add multiple field in your form !

| Attribute | Type | Default |
| --------- | ---- | ------- |
| legend    | string |       |
| listing   | string | null  |
| template  | string | null  |
| min       | int  | null    |
| max       | int  | null    |
| name      | string | dynamic |
| type      | string | dynamic |
| sortable  | boolean | false |
| items     | array | []     |
| defaults  | array | []     |
| itemsDisabled | array | []     |
| help      | string | null  |
| btnAdd    | array | []     |
| btnRemove | array | []     |
| btnDelete | array | []     |
| btnMove   | array | []     |

*The legend is required.*
*The listing and template are path to some includes views.*
*The Drag&Drop is NOT initialize, you have to add the JS for that functionnality*

```
<x-bs-dynamic class="dynamic-automatic" legend="My dynamic field" listing="default.view.listing" template="default.view.template" min="1" max="5" name="mydynamic" type="mytype" sortable :items="[]" help="Help message" />
```

In the template view you have access to the **$default**;
In the listing view you have acces to the **$item**


###Customization:

You can globaly customize the buttons in the 'bs-component' config file.
Or you can set an array with the custom values (class,label,value) for each button.

```
<x-bs-dynamic class="dynamic-automatic" legend="My custom dynamic" :btnAdd="['class' => 'btn-info','label' => 'my.translation.path','value' => '<i class=icon-plus></i>']"/>
```

## Editor

To use the editor you need to install the JS plugin **QuillJS** !

| Attribute | Type | Default |
| --------- | ---- | ------- |
| label     | string | null  |
| name      | string |       |
| value     | string | null  |
| help      | string | null  |
| required  | boolean | false |
| toolbar   | string | header|format|list|link|color |
| colors    | string | primary|success|warning|danger |
| headers   | string | 1|2|3 |

*The name is required.*

```
<x-bs-editor label="My editor" name="editor" value="Default text" help="Help message" required toolbar="color" colors="primary|success" headers="1|2|3|4|5|6"/>
```
