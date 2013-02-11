Statamic HTTP Response-Header Plugin
================================

The HTTP Response-Header plugin can be used to conditionally add headers to the HTTP response as well as adding &lt;meta http-equiv... /&gt; to your page layouts.

## Installing
1. Download the zip file (or clone via git) and unzip it or clone the repo into `/_add-ons/`.
2. Ensure the folder name is `http_response_header` (Github timestamps the download folder).
3. Enjoy.

## Usage

Put the tag in your template with your desired parameters.

    {{ http_response_header field="X-Aweomeness" value="extreme" }}
    {{ http_response_header field="X-UA-Compatible" value="IE=edge,chrome=1" if_user_agent="MSIE" meta="yes" }}

## Parameters

### HTTP Response-Header Field `field`
**default: null**

The HTTP response-header field that you wish to add.

    field="X-Awesomeness"

### HTTP Response-Header Field Value `value`
**default: null**

The HTTP response-header field value.

    value="extreme"

### Meta `meta`
**default: no**

Return a &lt;meta http-equiv="`<field>`" content="`<value>`" /&gt; tag.

    meta="yes"

### If User Agent `if_user_agent`
**default: null**

If `if_user_agent` has a value then the header will only be displayed if the value can be found using `strpos()` in the user agent header. This is case sensitive.

    if_user_agent="MSIE"
