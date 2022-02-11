require("./bootstrap");

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import VueFeather from "vue-feather";
import "../../node_modules/aos/dist/aos.css";
import AOS from "aos";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component(VueFeather.name, VueFeather)
            .mixin({ methods: { route } })
            .mount(el);
    },
});
AOS.init();
InertiaProgress.init({ color: "#ffc107" });
