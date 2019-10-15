<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use eZ\Publish\API\Repository\SearchService;
use eZ\Publish\API\Repository\Values\Content\Query;

class GeoJsonController
{

    /**
     * @var SearchService
     */
    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function getStoresAction(){

        $query = new Query();
        $criteria = [
            new Query\Criterion\ContentTypeIdentifier('store'),
        ];

        $query->filter = new Query\Criterion\LogicalAnd($criteria);

        $result = $this->searchService->findContent( $query );

        $features = [];

        foreach($result->searchHits as $store){

            $location = $store->valueObject->getFieldValue('location');
            $telephone = $store->valueObject->getFieldValue('telephone');

            $popupContent = '<h1>' . $store->valueObject->getName() . '</h1><p>' . $location->address . '<br/>tel: ' . $telephone . '</p>';

            $properties = [
                'name' => $store->valueObject->getName(),
                'amenity' => 'Fruit Store',
                'popupContent' => $popupContent
            ];

            $features[] = new \GeoJson\Feature\Feature(new \GeoJson\Geometry\Point([$location->longitude,$location->latitude]),$properties);
        }

        $featureCollection = new \GeoJson\Feature\FeatureCollection($features);

        return new JsonResponse($featureCollection);

    }
}
