# Installation

Install the package via composer:

```
composer require nh/bs-component
```

# Form Components

All the component manage the request old() value and the validation.

## Input

```
<x-bs-input type="text" label="My label" name="fieldname" value="Default value" placeholder="My placeholder" help="Help message" size="lg" readonly disabled required />
```

## Textarea

```
<x-bs-textarea label="My label" name="fieldname" value="Default value" placeholder="My placeholder" help="Help message" readonly disabled required />
```

## Checks

```
<x-bs-check type="checkbox" label="My label" name="fieldname" value="Default value" help="Help message" checked disabled required />
```

## Checks List

```
<x-bs-check-list type="checkbox" label="My label" name="fieldname[]" :options="[1 => 'one', 2 => 'two']" help="Help message" :checked="[2]" disabled required />
```

## Select

```
<x-bs-select label="My label" name="fieldname" :options="[1 => 'one', 2 => 'two']" help="Help message" size="lg" :selected="[2]" multiple disabled required />
```

## Input File

```
<x-bs-input-file label="My label" name="fieldname" placeholder="Choose a file" button="Browse" help="Help message" size="lg" disabled required />
```

## Datepicker

```
<x-bs-datepicker label="My label" name="fieldname" value="2020-05-04" placeholder="Select a date" help="Help message" size="lg" readonly disabled required mode="single" format="datetime" min="2020-05-01" max="2020-05-31"/>
```
