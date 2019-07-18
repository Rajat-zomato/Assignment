package com.example.api

import retrofit2.http.GET
import io.reactivex.Observable
import retrofit2.Retrofit
import retrofit2.adapter.rxjava2.RxJava2CallAdapterFactory
import retrofit2.converter.gson.GsonConverterFactory

interface PhotoApi{
    @GET("/photos")
    fun getAllPhotos(): Observable<List<PhotoModel>>

    companion object {
        fun create(): PhotoApi {
            val retrofit = Retrofit.Builder()
                .addCallAdapterFactory(RxJava2CallAdapterFactory.create())
                .addConverterFactory(GsonConverterFactory.create())
                .baseUrl("https://jsonplaceholder.typicode.com")
                .build()
            return retrofit.create(PhotoApi::class.java)
        }
    }


}