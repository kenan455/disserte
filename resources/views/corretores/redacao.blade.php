<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>REDAÇÃO</title>

        
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <script src="{{ asset('assets/js/me.js') }} "></script>
        <script src="{{ asset('assets/dist/me-markdown.standalone.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <style type="text/css">
            
            .markdown {
                display: none; 
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="editor">
                
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur egestas viverra libero, quis volutpat nisl semper vitae. Curabitur dapibus eros velit, sed imperdiet orci iaculis lobortis. Aliquam cursus pharetra tellus nec elementum. Nam eu cursus lorem, sit amet vehicula lorem. Cras in viverra nisl. Vivamus ultrices gravida molestie. Integer dolor augue, finibus ut nulla id, tincidunt fermentum tellus. In blandit efficitur ipsum, in interdum elit feugiat eu. Morbi sodales sem id risus eleifend, non euismod neque interdum. Vivamus hendrerit ex ipsum, at interdum mauris varius et. Sed a varius metus. Nulla dapibus tortor nisi, ac placerat velit lobortis vel. Donec facilisis, ex a ultrices vulputate, turpis lacus convallis nisi, in pharetra libero sem vitae leo.

            </div>
                <pre class="markdown">
                    
                </pre>







                <script src="path/to/medium-editor.js"></script>

                <script src="path/to/me-markdown.standalone.min.js"></script>
                <script>
                    (function () {
                        var markDownEl = document.querySelector(".markdown");
                        new MediumEditor(document.querySelector(".editor"), {
                            extensions: {
                                markdown: new MeMarkdown(function (md) {
                                    markDownEl.textContent = md;
                                })
                            }
                        });
                    })();
                </script>
        </div>
    </body>
</html>
