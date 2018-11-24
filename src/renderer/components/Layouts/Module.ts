import Vue from 'vue';
import DownloaderService from "../../../main/services/utils/downloader.service";

export default Vue.extend({
    name: "Module",
    props: ['server'],
    methods: {
        download() {
            const downloaderService = this.$container.get<DownloaderService>(DownloaderService.name);


            console.log(downloaderService);
            console.log(DownloaderService);
            console.log('vc');



            downloaderService.add({
                name: 'test1.zip',
                url: 'http://ipv4.download.thinkbroadband.com/5MB.zip'
            });


            downloaderService.downloadAll().then(() => {
                console.log('download finished');
            });
        }
    },
    data() {
        return {
            progress: 0
        }
    }
})