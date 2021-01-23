<?php
    class image extends KInput
    {
        protected $src;
        protected $height;
        protected $width;
        protected $sizes;	
        protected $alt;
        protected $title;	
        protected $srcSet;	
        protected $useMap;	
        protected $crossOrigin;	
        protected $isMap;
        protected $loading;	
        protected $longDesc;
        protected $referrerPolicy;

        public function __construct( array $attributes = [] ) {
            parent::__construct( $attributes );
            $this->setType("image");
        }

        public function setSrc ( $src ){
            $this->src = $src;
        }

        public function getSrc (){
            return $this->src;
        }

        public function setHeight ( $height ){
            $this->height = $height;
        }
        
        public function getHeight (){
            return $this->height;
        }

        public function setWidth ( $width ){
            $this->width = $width;
        }
        
        public function getWidth (){
            return $this->width;
        }

        public function setSizes ( $sizes ){
            $this->sizes = $sizes;
        }
        
        public function getSizes (){
            return $this->sizes;
        }

        public function setAlt ( $alt ){
            $this->alt = $alt;
        }
        
        public function getAlt (){
            return $this->alt;
        }

        public function setTitle ( $title ){
            $this->title = $title;
        }

        public function getTitle (){
            return $this->title;
        }

        public function setSrcSet ( $srcSet ){
            $this->srcSet = $srcSet;
        }
        
        public function getSrcSet (){
            return $this->srcSet;
        }

        public function setUseMap ( $useMap ){
            $this->useMap = $useMap;
        }
        
        public function getUseMap (){
            return $this->useMap;
        }

        public function setCrossOrigin ( $crossOrigin ){
            $this->crossOrigin = $crossOrigin;
        }
        
        public function getCrossOrigin (){
            return $this->crossOrigin;
        }


        public function setIsMap ( $isMap ){
            $this->isMap = $isMap;
        }
        
        public function getIsMap (){
            return $this->isMap;
        }

        public function setLoading ( $loading ){
            $this->loading = $loading;
        }
        
        public function getLoading (){
            return $this->loading;
        }

        public function setLongDesc ( $longDesc ){
            $this->longDesc = $longDesc;
        }
        
        public function getLongDesc (){
            return $this->longDesc;
        }

        public function setReferrerPolicy ( $referrerPolicy ){
            $this->referrerPolicy = $referrerPolicy;
        }
        
        public function getReferrerPolicy (){
            return $this->referrerPolicy;
        }

    }
