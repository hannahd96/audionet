<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Customer extends Model
{
  //a customer can make many reviews
  public function reviews()
  {
    return $this->hasMany('App\Review');
  }

  public function orders()
  {
    return $this->hasMany('App\Order');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function recommended() {
      return $this->otherMovies()->sortByDesc(function ($m) { return $m->starRating(); })->take(8);
  }

  public function movies() {
      $myMovies = collect([]);
      foreach ($this->orders as $order) {
          foreach ($order->movies as $movie) {
              if (!Movie::inCollection($movie, $myMovies)) {
                  $myMovies->push($movie);
              }
          }
      }
      return $myMovies;
  }

  public function similarCustomers() {
      $similarCustomers = collect([]);
      foreach ($this->movies() as $movie) {
          $orders = $movie->orders;
          foreach ($orders as $order) {
              $customer = $order->customer;
              if ($customer->id != $this->id) {
                  if ($similarCustomers->first(function($c) use ($customer) { return $c->id == $customer->id; }) == null) {
                      $similarCustomers->push($customer);
                  }
              }
          }
      }
      return $similarCustomers;
  }

  public function otherMovies() {
       $myMovies = $this->movies();
       $otherMovies = collect([]);
       foreach ($this->similarCustomers() as $customer) {
           $orders = $customer->orders;
           foreach ($orders as $order) {
               $movies = $order->movies;
               foreach ($movies as $movie) {
                   if (!Movie::inCollection($movie, $myMovies) && !Movie::inCollection($movie, $otherMovies)) {
                       $otherMovies->push($movie);
                   }
               }
           }
       }
       return $otherMovies;
  }
}
