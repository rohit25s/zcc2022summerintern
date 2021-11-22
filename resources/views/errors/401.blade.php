@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section('description', __( $exception->getMessage() ? $exception->getMessage() :'Whoops, something went wrong on our servers.'))
