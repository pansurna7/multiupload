<!DOCTYPE html>

<html lang="en">

<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

    <style type="text/css">

        .main-section{

            margin:0 auto;

            padding: 20px;

            margin-top: 100px;

            background-color: #fff;

            box-shadow: 0px 0px 20px #c1c1c1;

        }

        .fileinput-remove,

        .fileinput-upload{

            display: none;

        }

    </style>

</head>

<body class="bg-danger">
    <form method="POST" action="{{ route('file.upload.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 col-11 main-section">
                    <h1 class="text-center text-danger">File Input Example</h1><br>
                    <div class="form-group">
                        <div class="file-loading">
                            <input id="file-1" type="file" name="images[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="3">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "/imageUpload.php",
            allowedFileExtensions: ['jpg', 'png', 'gif','png','jpeg'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 5,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>
</body>

</html>