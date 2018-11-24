import { injectable } from "inversify";

@injectable()
export default class DownloaderService  {
    constructor() {
        console.log('Hre');
    }

    add(data: any) {
        console.log('add download ====> ' + data.url);
    }

    downloadAll(): Promise<any> {
     return new Promise((resolve: any) => {
        resolve();
     });
    }
}