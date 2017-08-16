@extends('layouts.dash')

@push('styles')
  <link rel="stylesheet" href="/modulobd/styles/style.css" media="all" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="styles/ie6.css" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="styles/ie7.css" /><![endif]-->
	<link rel="stylesheet" href="/modulobd/styles/print.css" type="text/css" media="print" />

@endpush

@section('content')
  <div class="col-md-6">
    <div class="container">
      <div id="area"></div>

        <div id="controls">
          <div id="bar">
            <div id="toggle"></div>
            <button type="button" id="saveload" class="btn btn-warning">Guardar SQL</button>

            <button type="button" id="addtable" class="btn btn-primary">Agregar Tabla</button>
            <br>
            <br>
            <button type="button" id="edittable" class="btn btn-primary">Editar Tabla</button>
            <br>
            <br>
            <button type="button" id="tablekeys" class="btn btn-primary">Llaves</button>
            <br>
            <br>
            <button type="button" id="removetable" class="btn btn-primary">Eliminar Tabla</button>
            <br>
            <br>
            <button type="button" id="aligntables" class="btn btn-primary">Alinear Tabla</button>
            <br>
            <br>
            <button type="button" id="cleartables" class="btn btn-primary">Limpiar Tabla</button>

            <br>
            <br>
            <br>

            <button type="button" id="addrow" class="btn btn-primary">Agregar Campo</button>
            <br>
            <br>
            <button type="button" id="editrow" class="btn btn-primary">Editar Campo</button>
            <br>
            <br>
            <button type="button" id="uprow" class="btn btn-primary">Arriba</button><button type="button" id="downrow" class="btn btn-primary">Abajo</button>
            <br>
            <br>
            <button type="button" id="foreigncreate" class="btn btn-primary">Crear Llave Foranea</button>
            <br>
            <br>
            <button type="button" id="foreignconnect" class="btn btn-primary">Conectar Llave Foranea</button>
            <br>
            <br>
            <button type="button" id="foreigndisconnect" class="btn btn-primary">Eliminar Llave Foranea</button>
            <br>
            <br>
            <button type="button" id="removerow" class="btn btn-primary">Eliminar Campo</button>

            <hr/>

            <input type="button" id="options" />
            <a href="https://github.com/ondras/wwwsqldesigner/wiki" target="_blank"><input style="display: none;" type="button" id="docs" value="" /></a>
          </div>

  <div id="rubberband"></div>

  <div id="minimap"></div>

  <div id="background"></div>

  <div id="window">
    <div id="windowtitle"><img id="throbber" src="/modulobd/images/throbber.gif" alt="" title=""/></div>
    <div id="windowcontent"></div>
    <input type="button" id="windowok" />
    <input type="button" id="windowcancel" />
  </div>
</div> <!-- #controls -->

<div id="opts">
  <table>
    <tbody>
      <tr>
        <td>
          * <label id="language" for="optionlocale"></label>
        </td>
        <td>
          <select id="optionlocale"><option></option></select>
        </td>
      </tr>
      <tr>
        <td>
          * <label id="db" for="optiondb"></label>
        </td>
        <td>
          <select id="optiondb"><option></option></select>
        </td>
      </tr>
      <tr>
        <td>
          <label id="snap" for="optionsnap"></label>
        </td>
        <td>
          <input type="text" size="4" id="optionsnap" />
          <span class="small" id="optionsnapnotice"></span>
        </td>
      </tr>
      <tr>
        <td>
          <label id="pattern" for="optionpattern"></label>
        </td>
        <td>
          <input type="text" size="6" id="optionpattern" />
          <span class="small" id="optionpatternnotice"></span>
        </td>
      </tr>
      <tr>
        <td>
          <label id="hide" for="optionhide"></label>
        </td>
        <td>
          <input type="checkbox" id="optionhide" />
        </td>
      </tr>
      <tr>
        <td>
          * <label id="vector" for="optionvector"></label>
        </td>
        <td>
          <input type="checkbox" id="optionvector" />
        </td>
      </tr>
      <tr>
        <td>
          * <label id="showsize" for="optionshowsize"></label>
        </td>
        <td>
          <input type="checkbox" id="optionshowsize" />
        </td>
      </tr>
      <tr>
        <td>
          * <label id="showtype" for="optionshowtype"></label>
        </td>
        <td>
          <input type="checkbox" id="optionshowtype" />
        </td>
      </tr>
    </tbody>
  </table>

  <hr />

  * <span class="small" id="optionsnotice"></span>
</div>

<div id="io">
  <table>
    <tbody>
      <tr>
        <td style="width:60%">
          <fieldset>
            <legend style="display: none;" id="client"></legend>
            <input type="button" id="clientsql" />
            <div id="singlerow" style="display: none;">
            <input type="button" id="clientsave" />
            <input type="button" id="clientload" />
            </div>
            <div id="singlerow" style="display: none;">
            <input type="button" id="clientlocalsave" />
            <input type="button" id="clientlocalload" />
            <input type="button" id="clientlocallist" />
            </div>
            <div id="singlerow" style="display: none;">
              <input type="button" id="dropboxsave" /><!-- may get hidden by dropBoxInit() -->
              <input type="button" id="dropboxload" /><!-- may get hidden by dropBoxInit() -->
              <input type="button" id="dropboxlist" /><!-- may get hidden by dropBoxInit() -->
            </div>
            <hr/>
          </fieldset>
        </td>
        <td style="width:40%">
          <fieldset>
            <legend style="display: none;" id="server"></legend>
            <label style="display: none;" for="backend" id="backendlabel"></label> <select style="display: none;" id="backend"><option></option></select>
            <hr/>
            <input style="display: none;" type="button" id="serversave" />
            <input style="display: none;" type="button" id="quicksave" />
            <input style="display: none;" type="button" id="serverload" />
            <input style="display: none;" type="button" id="serverlist" />
            <input style="display: none;" type="button" id="serverimport" />
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <fieldset>
            <legend id="output"></legend>
            <textarea id="textarea" rows="1" cols="1"></textarea><!--modified by javascript later-->
          </fieldset>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div id="keys">
  <fieldset>
    <legend id="keyslistlabel"></legend>
    <select id="keyslist"><option></option></select>
    <input type="button" id="keyadd" />
    <input type="button" id="keyremove" />
  </fieldset>
  <fieldset>
    <legend id="keyedit"></legend>
    <table>
      <tbody>
        <tr>
          <td>
            <label for="keytype" id="keytypelabel"></label>
            <select id="keytype"><option></option></select>
          </td>
          <td></td>
          <td>
            <label for="keyname" id="keynamelabel"></label>
            <input type="text" id="keyname" size="10" />
          </td>
        </tr>
        <tr>
          <td colspan="3"><hr/></td>
        </tr>
        <tr>
          <td>
            <label for="keyfields" id="keyfieldslabel"></label><br/>
            <select id="keyfields" size="5" multiple="multiple"><option></option></select>
          </td>
          <td>
            <input type="button" id="keyleft" value="&lt;&lt;" /><br/>
            <input type="button" id="keyright" value="&gt;&gt;" /><br/>
          </td>
          <td>
            <label for="keyavail" id="keyavaillabel"></label><br/>
            <select id="keyavail" size="5" multiple="multiple"><option></option></select>
          </td>
        </tr>
      </tbody>
    </table>
  </fieldset>
</div>

<div id="table">
  <table>
    <tbody>
      <tr>
        <td>
          <label id="tablenamelabel" for="tablename"></label>
        </td>
        <td>
          <input id="tablename" type="text" />
        </td>
      </tr>
      <tr>
        <td>
          <label id="tablecommentlabel" for="tablecomment"></label>
        </td>
        <td>
          <textarea rows="5" cols="40" id="tablecomment"></textarea>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
@endsection

@push('functions')
  <script src="/js/bootstrap.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/dropbox.js/0.10.2/dropbox.min.js"></script>
	<script src="/modulobd/js/oz.js"></script>
	<script src="/modulobd/js/config.js"></script>
	<script src="/modulobd/js/globals.js"></script>
	<script src="/modulobd/js/visual.js"></script>
	<script src="/modulobd/js/row.js"></script>
	<script src="/modulobd/js/table.js"></script>
	<script src="/modulobd/js/relation.js"></script>
	<script src="/modulobd/js/key.js"></script>
	<script src="/modulobd/js/rubberband.js"></script>
	<script src="/modulobd/js/map.js"></script>
	<script src="/modulobd/js/toggle.js"></script>
	<script src="/modulobd/js/io.js"></script>
	<script src="/modulobd/js/tablemanager.js"></script>
	<script src="/modulobd/js/rowmanager.js"></script>
	<script src="/modulobd/js/keymanager.js"></script>
	<script src="/modulobd/js/window.js"></script>
	<script src="/modulobd/js/options.js"></script>
	<script src="/modulobd/js/wwwsqldesigner.js"></script>
  <script type="text/javascript">
    var d = new SQL.Designer();
  </script>
@endpush
