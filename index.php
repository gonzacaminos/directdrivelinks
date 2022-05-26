<!DOCTYPE html>
<html lang="en" dir="ltr" ng-app="myApp" ng-controller="myCtrl">
  <head>
    <meta charset="utf-8">
    <title>Direct Drive Links</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>
    <div class="wrapper">
      <a href="https://github.com/gonzalobonini/directdrivelinks" class="github-corner" aria-label="View source on GitHub"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a>
      <div class="nav row">
        <div class="container">
          <div class="columns six">
            <p class="title">Direct Drive Links</p>
          </div>
          <div class="credits columns six">
            Developed with <i class="fas fa-heart"></i> and  <a href="http://angularjs.org"><i class="fab fa-angular"></i></a> by <a href="http://gonza.io">Gonza</a>.  Based on: <a href="https://www.labnol.org/internet/direct-links-for-google-drive/28356/" target="_blank">this blog post</a>
          </div>
        </div>
      </div>
        <div class="type-block row">
          <div class="container">
            <h5>Choose the type of file</h5>

            <div class="block file-block two columns">
              <input type="radio" name="fileType" id="file" ng-model="fileType" class="input-hidden" value="file"  checked/>
              <label for="file">
                <img src="img/drive.png"alt="Drive File" >
                <p>Google Drive File</p>
              </label>
            </div>

            <div class="block file-block two columns">
              <input type="radio" name="fileType" id="docs" ng-model="fileType" ng-change="setFormat('doc')" class="input-hidden" value="docs"/>
              <label for="docs">
                <img src="img/docs.png" alt="Google Docs" >
                <p>Google Docs</p>
              </label>
            </div>

            <div class="block file-block two columns">
              <input type="radio" name="fileType" id="sheets" ng-model="fileType" ng-change="setFormat('xls')"  class="input-hidden" value="sheets"/>
              <label for="sheets">
                <img src="img/sheets.png" alt="Google Sheets" >
                <p>Google Sheets</p>
              </label>
            </div>

            <div class="block file-block two columns">
              <input type="radio" name="fileType" id="slides" ng-model="fileType" ng-change="setFormat('ppt')"  class="input-hidden" value="slides"/>
              <label for="slides">
                <img src="img/slides.png" alt="Google Slides" >
                <p>Google Slides</p>
              </label>
            </div>

        </div>
      </div>

      <div class="link-block row">
        <div class="container">

          <h5>Paste your sharing link here</h5>
          <p>The link must be set to <strong>Public</strong> or <strong>Anyone with the link can see</strong></p>
          <input type="text" name="fileLink" class="link-input" id="fileLink" ng-model="fileLink" value="" placeholder="Your link" ng-change="makeFileLink(this)">
          <select class="{{fileType}} format" name="format" id="format" ng-model="format">
            <option class="docs" value="doc" selected>doc</option>
            <option class="docs" value="docx">docx</option>
            <option class="docs" value="odt">odt</option>
            <option class="docs" value="txt">txt</option>
            <option class="docs sheets slides" value="pdf">pdf</option>
            <option class="sheets" value="xls">xls</option>
            <option class="sheets" value="xls">xlsx</option>
            <option class="slides" value="ppt">ppt</option>
            <option class="slides" value="pptx">pptx</option>
          </select>
          <p><small>Example: https://drive.google.com/file/d/0B4fk8L6brI_eX1U5Ui1Lb1FpVG8/edit?usp=sharing</small></p>

        </div>
      </div>

      <div class="result-block {{hasLink}}">
        <div class="container">
          <h5> Result: </h5>
          <input type="text" class="result link-input" name="result" id="result" value="{{fileDirectLink}}" placeholder="Your link will appear here" readonly> <span><a href="{{fileDirectLink}}" class="button" target="_blank"><i class="fas fa-link"></i> Try it!</a> <a class="button button-primary copy" data-clipboard-target="#result"><i class="fas fa-copy"></i> <span> Copy</span></a></span>
        </div>
      </div>

    </div>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/clipboard.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
