import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
*/

// import Echo from 'laravel-echo';
import * as PusherPushNotifications from "@pusher/push-notifications-web";
import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? "us2",
    enabledTransports: ["ws", "wss"],
});

var channel = window.Echo.channel("my-channel");
channel.listen(".my-event", function (data) {
    console.dir(JSON.stringify(data));
});

const beamsClient = new PusherPushNotifications.Client({
    instanceId: "4847f1ee-122e-4801-b59a-87989597a133",
});
if (window.userId == 1) {
    beamsClient
        .start()
        .then((beamsClient) => beamsClient.getDeviceId())
        .then((deviceId) =>
            console.log(
                "Successfully registered with Beams. Device ID:",
                deviceId
            )
        )
        .then(() => beamsClient.addDeviceInterest("notification"))
        .then(() => beamsClient.getDeviceInterests())
        .then((interests) => console.log("Current interests:", interests))
        .catch(console.error);
}

$(function () {
   
    
    $(".register .cities").hide();
    $(".register #city_id").prop("disabled", true).val("");

    $(".register #department_id").on("change", (e) => {
        $(".cities").hide();
        $(".department" + e.target.value).show();
        $("#city_id").val("").prop("disabled", false);
    });

});