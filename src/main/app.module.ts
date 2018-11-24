import LoggerService from "./services/utils/logger.service";
import AppService from "./services/app.service";
import CookieService from "./services/utils/cookie.service";
import Api from './services/api/api.module';
import ConfigService from "./services/utils/config.service";
import SocketService from "./services/utils/socket.service";
import DownloaderService from "./services/utils/downloader.service";

/**
 * List of classes what you want to be autoInjectable
 *
 * Like angular DI
 *
 */
export default [
    Api,
    LoggerService,
    SocketService,
    AppService,
    CookieService,
    DownloaderService,
    ConfigService
]