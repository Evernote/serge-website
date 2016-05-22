<?php
    $command = 'serge-test-parser';
    include($_SERVER['DOCUMENT_ROOT'] . '/../inc/help-header.php');
?>


<h1 id="NAME">NAME</h1>

<p>serge-test-parser - Test parser against any given file</p>

<h1 id="SYNOPSIS">SYNOPSIS</h1>

<p><code>serge test-parser &lt;parser_name&gt; &lt;file_path&gt; [--import-mode] [--output-mode=&lt;mode&gt;] [--data-file=&lt;file_path&gt;]</code></p>

<p>Where <code>&lt;parser_name&gt;</code> is a class name of the parser, and <code>&lt;file_path&gt;</code> is a path to the localizable file to test this parser on.</p>

<p>Note that you can omit the <code>Serge::Engine::Plugin::</code> prefix of the parser class name if your parser is located in lib/Serge/Engine/Plugin folder. Consider the following examples of <code>&lt;parser_name&gt;</code> parameter:</p>

<dl>

<dt><b>parse_android</b></dt>
<dd>

<p>Use <code>Serge::Engine::Plugin::parse_android</code> parser class.</p>

</dd>
<dt><b>Serge::Engine::Plugin::parse_android</b></dt>
<dd>

<p>Same as above (explicit class declaration).</p>

</dd>
<dt><b>ACME::Parser</b></dt>
<dd>

<p>Use <code>ACME::Parser</code> parser class.</p>

</dd>
</dl>

<h1 id="DESCRIPTION">DESCRIPTION</h1>

<p>Parse the given file using the selected parser and emit the resulting data in one of the available formats. This is useful for writing new parsers.</p>

<h1 id="OPTIONS">OPTIONS</h1>

<dl>

<dt><b>--import-mode</b></dt>
<dd>

<p>With this option, parser will be told it works in import mode. In such mode import-aware parsers are expected to extract translations rather than source strings, and also skip missing translations.</p>

</dd>
<dt><b>--output-mode=&lt;mode&gt;</b></dt>
<dd>

<p>By default, parsed data will be emitted in an easily readable Config::Neat format (the format used in Serge configuration files). Such files are also suitable for diff. However, there are alternative output modes available:</p>

<dl>

<dt><b>dumper</b></dt>
<dd>

<p>Use Data::Dumper to dump the parsed structure. The format is a bit verbose, but can be handy for debugging.</p>

</dd>
</dl>

</dd>
<dt><b>--data-file=&lt;file_path&gt;</b></dt>
<dd>

<p>Some parsers require configuration data. You can pass data structure to the parser using this parameter. Target file should be a configuration file in Config::Neat format with the parser data that you would usually put into <code>jobs &gt; ... &gt; parser &gt; data</code> section of Serge configuration file.</p>

</dd>
</dl>

<h1 id="SEE-ALSO">SEE ALSO</h1>

<p>Part of <a href="../serge/">serge</a> suite.</p>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/../inc/help-footer.php') ?>

