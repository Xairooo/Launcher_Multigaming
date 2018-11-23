import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { AppComponent } from '../app.component';

enum HttpMethods {
  GET,
  POST,
  DELETE,
  PUT
}

@Injectable({
  providedIn: 'root'
})
export class HttpService {

  constructor(private httpClient: HttpClient) { }

  private request<T>(method: HttpMethods, url: string, data: {} = {}): Promise<T> {
    const token = localStorage.getItem('token');
    let headers = new HttpHeaders()
      .set('Content-Type', 'application/json');

    if (token) {
      headers = headers.set('authorization', token);
    }

    url = environment.apiUrl + url;

    return this.httpClient.request<T>(HttpMethods[method.toString()], url, { headers: headers, body: data }).toPromise().catch((err) => {
      if (err && err.status && err.status === 401) {
        if (localStorage.getItem('token')) {
          localStorage.removeItem('token');
          window.location.href = '/';
        }
      }
      throw err;
    });
  }

  get<T>(url: string): Promise<T> {
    return this.request<T>(HttpMethods.GET, url);
  }

  post<T>(url: string, data: {}): Promise<T> {
    return this.request<T>(HttpMethods.POST, url, data);
  }

  delete<T>(url: string): Promise<T> {
    return this.request<T>(HttpMethods.DELETE, url);
  }

  put<T>(url: string, data: {}): Promise<T> {
    return this.request<T>(HttpMethods.PUT, url, data);
  }

}
