<?php


namespace Human;


class ClassReviewFactory
{
    public function getInstance($name,$gender){
        return new ClassReview($name,$gender);
    }
}