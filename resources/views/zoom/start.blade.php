<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Join Zoom Meeting</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.2/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.2/css/react-select.css"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>


<body class="ReactModal__Body--open">


    <input type="hidden" id="role" value="{{ $role }}">
    <input type="hidden" id="user_name" value="{{ Auth::User()->name }}">
    <input type="hidden" id="meeting_id" value="{{ $meeting->meeting_id }}">
    <input type="hidden" id="meeting_password" value="{{ $meeting->meeting_password }}">
    <input type="hidden" id="zoom_api_key" value="aei7SOvRStmKoWHIXUaN1Q">
    <input type="hidden" id="zoom_api_secret" value="iC0IAn201Ey0g56cO0Dp9nehe6R6AeA7JvJj">


    <div id="zmmtg-root"></div>
    <div id="aria-notify-area"></div>
      <!-- import ZoomMtg dependencies -->
      <script src="https://source.zoom.us/1.7.9/lib/vendor/react.min.js"></script>
      <script src="https://source.zoom.us/1.7.9/lib/vendor/react-dom.min.js"></script>
      <script src="https://source.zoom.us/1.7.9/lib/vendor/redux.min.js"></script>
      <script src="https://source.zoom.us/1.7.9/lib/vendor/redux-thunk.min.js"></script>
      <script src="https://source.zoom.us/1.7.9/lib/vendor/jquery.min.js"></script>
      <script src="https://source.zoom.us/1.7.9/lib/vendor/lodash.min.js"></script>
  
      <!-- import ZoomMtg -->
      <script src="https://source.zoom.us/zoom-meeting-1.7.9.min.js"></script>
      


    <script type="text/javascript">

    $(document).ready(function(){
        ZoomMtg.setZoomJSLib('https://dmogdx0jrul3u.cloudfront.net/1.7.9/lib', '/av'); 
        ZoomMtg.preLoadWasm();
        ZoomMtg.prepareJssdk();

        const role = document.getElementById("role");
        const zoomMeeting = document.getElementById("zmmtg-root");
        const user_name = document.getElementById("user_name");
        const meeting_id = document.getElementById('meeting_id');
        const meeting_password = document.getElementById("meeting_password");
        const zoom_api_key = document.getElementById("zoom_api_key");
        const zoom_api_secret = document.getElementById("zoom_api_secret");
        const prev_url = document.referrer;

        const signature = ZoomMtg.generateSignature({
            meetingNumber: meeting_id.value,
            apiKey: zoom_api_key.value,
            apiSecret: zoom_api_secret.value,
            role: role.value,
            success: function (res) {
            console.log(res.result);
            },
        });
        ZoomMtg.init({
            leaveUrl: `/leave-meeting?meeting_id=${meeting_id.value}`,
            isSupportAV: true,
            success: function (res) {
                ZoomMtg.join(
                    {
                        meetingNumber: meeting_id.value,
                        userName: 'Ahmed',
                        signature: signature,
                        apiKey: zoom_api_key.value,
                        passWord: meeting_password.value,
                        success: function(res){

                            $('#nav-tool').hide();
                            console.log('join meeting success');
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    }
                );
            },
            error: function(res) {

                console.log(res);
            }
        }); 

        ZoomMtg.endMeeting({
            success:() => {
                console.log('a')
            }
        });

        ZoomMtg.leaveMeeting({
            success:() => {
                console.log('b')
            }
        });
        });


        


    </script>



    
</body>
</html>