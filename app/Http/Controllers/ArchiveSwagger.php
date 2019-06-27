<?php
use Swagger\Annotations as SWG;
/**
 * @SWG\Swagger(
 *     basePath="/api/v1",
 *     schemes={"http","https"},
 *     host=L5_SWAGGER_CONST_HOST,
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="L5 Swagger API",
 *         description="Api integration Petloop",
 *         @SWG\Contact(
 *             email="support@petloop.com.br"
 *         ),
 *     ),
 *     @SWG\Definition(
 *         definition="Client",
 *         required={"phone"},
 *         @SWG\Property(property="fullname", type="string"),
 *         @SWG\Property(property="phone", type="string"),
 *         @SWG\Property(property="petname", type="string"),
 *         @SWG\Property(property="picture", type="file"),
 *         @SWG\Property(property="token", type="string"),
 *      ),
 *     @SWG\Definition(
 *         definition="Address",
 *         @SWG\Property(property="street", type="string"),
 *         @SWG\Property(property="city", type="string"),
 *         @SWG\Property(property="district", type="string"),
 *         @SWG\Property(property="state", type="string"),
 *         @SWG\Property(property="country", type="string"),
 *         @SWG\Property(property="reference", type="string"),
 *         @SWG\Property(property="complement", type="string"),
 *         @SWG\Property(property="numberHome", type="string"),
 *         @SWG\Property(property="zipCode", type="string"),
 *         @SWG\Property(property="latitude", type="integer"),
 *         @SWG\Property(property="longitude", type="integer"),
 *         @SWG\Property(property="clients_id", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *      ),
 *     @SWG\Definition(
 *         definition="Custumer",
 *         @SWG\Property(property="email", type="string"),
 *         @SWG\Property(property="phone", type="string"),
 *         @SWG\Property(property="fullname", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="street", type="string"),
 *         @SWG\Property(property="city", type="string"),
 *         @SWG\Property(property="district", type="string"),
 *         @SWG\Property(property="state", type="string"),
 *         @SWG\Property(property="country", type="string"),
 *         @SWG\Property(property="reference", type="string"),
 *         @SWG\Property(property="numberHome", type="string"),
 *         @SWG\Property(property="zipCode", type="string"),
 *         @SWG\Property(property="isPaymentCad", type="boolean"),
 *         @SWG\Property(property="isPaymentCash", type="boolean"),
 *         @SWG\Property(property="latitude", type="integer"),
 *         @SWG\Property(property="longitude", type="integer"),
 *         @SWG\Property(property="rating", type="integer"),
 *         @SWG\Property(property="fee_fast", type="integer"),
 *         @SWG\Property(property="fee_long", type="integer"),
 *         @SWG\Property(property="km_fast", type="integer"),
 *         @SWG\Property(property="km_long", type="integer"),
 *         @SWG\Property(property="time_open", type="string"),
 *         @SWG\Property(property="time_close", type="string"),
 *         @SWG\Property(property="isSaturday", type="boolean"),
 *         @SWG\Property(property="isSunday", type="boolean"),
 *         @SWG\Property(property="token", type="string"),
 *      ),
 *     @SWG\Definition(
 *         definition="Product",
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="specification", type="string"),
 *         @SWG\Property(property="mark", type="string"),
 *         @SWG\Property(property="summary", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="categorys_id", type="integer"),
 *         @SWG\Property(property="sub_categorys_id", type="integer"),
 *      ),
 *     @SWG\Definition(
 *         definition="SubProduct",
 *         @SWG\Property(property="code", type="string"),
 *         @SWG\Property(property="picture", type="file"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="price", type="integer"),
 *         @SWG\Property(property="discount", type="integer"),
 *         @SWG\Property(property="isOffer", type="boolean"),
 *         @SWG\Property(property="products_id", type="integer"),
 *      ),
 *     @SWG\Definition(
 *         definition="Category",
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *      ),
 *     @SWG\Definition(
 *         definition="SubCategory",
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *      ),
 *     @SWG\Definition(
 *         definition="Banner",
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="url", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *      ),
 *     @SWG\Definition(
 *         definition="Favorite",
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="client_id", type="integer"),
 *         @SWG\Property(property="products_id", type="integer"),
 *      ),
 *     @SWG\Definition(
 *         definition="Evaluation",
 *         @SWG\Property(property="rating", type="integer"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="client_id", type="integer"),
 *         @SWG\Property(property="orders_id", type="integer"),
 *      ),
 *     @SWG\Definition(
 *         definition="Order",
 *         @SWG\Property(property="phone", type="string"),
 *         @SWG\Property(property="total", type="integer"),
 *         @SWG\Property(property="discount", type="integer"),
 *         @SWG\Property(property="nameCliente", type="string"),
 *         @SWG\Property(property="paymentType", type="string",enum={"MONEY","CARD","CRYPTO"}),
 *         @SWG\Property(property="typeShop", type="string",enum={"DELIVERY","IN_STORE"}),
 *         @SWG\Property(property="street", type="string"),
 *         @SWG\Property(property="city", type="string"),
 *         @SWG\Property(property="district", type="string"),
 *         @SWG\Property(property="state", type="string"),
 *         @SWG\Property(property="country", type="string"),
 *         @SWG\Property(property="reference", type="string"),
 *         @SWG\Property(property="complement", type="string"),
 *         @SWG\Property(property="numberHome", type="string"),
 *         @SWG\Property(property="zipCode", type="string"),
 *         @SWG\Property(property="latitude", type="integer"),
 *         @SWG\Property(property="longitude", type="integer"),
 *         @SWG\Property(property="clients_id", type="integer"),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="coupons_id", type="integer"),
 *         @SWG\Property(
 *              property="getOrdersIetns",
 *              type="array",
 *              @SWG\Items(
 *                  ref="#/definitions/OrderItem",
 *              ),
 *          ),
 *      ),
 *     @SWG\Definition(
 *         definition="OrderItem",
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="quantity", type="integer"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="price", type="integer"),
 *         @SWG\Property(property="sub_products_id", type="integer"),
 *      ),
 *     @SWG\Definition(
 *         definition="PriceDymanic",
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="price", type="integer"),
 *         @SWG\Property(property="roleQtd", type="integer"),
 *         @SWG\Property(property="sub_products_id", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *      ),
 *     @SWG\Definition(
 *         definition="ClientResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="fullname", type="string"),
 *         @SWG\Property(property="phone", type="string"),
 *         @SWG\Property(property="petname", type="string"),
 *         @SWG\Property(property="token", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="AddressResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="street", type="string"),
 *         @SWG\Property(property="city", type="string"),
 *         @SWG\Property(property="district", type="string"),
 *         @SWG\Property(property="state", type="string"),
 *         @SWG\Property(property="country", type="string"),
 *         @SWG\Property(property="reference", type="string"),
 *         @SWG\Property(property="complement", type="string"),
 *         @SWG\Property(property="numberHome", type="string"),
 *         @SWG\Property(property="latitude", type="integer"),
 *         @SWG\Property(property="longitude", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="CustumerResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="email", type="string"),
 *         @SWG\Property(property="fullname", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="street", type="string"),
 *         @SWG\Property(property="city", type="string"),
 *         @SWG\Property(property="district", type="string"),
 *         @SWG\Property(property="state", type="string"),
 *         @SWG\Property(property="country", type="string"),
 *         @SWG\Property(property="reference", type="string"),
 *         @SWG\Property(property="numberHome", type="string"),
 *         @SWG\Property(property="zipCode", type="string"),
 *         @SWG\Property(property="isPaymentCad", type="boolean"),
 *         @SWG\Property(property="isPaymentCash", type="boolean"),
 *         @SWG\Property(property="latitude", type="integer"),
 *         @SWG\Property(property="longitude", type="integer"),
 *         @SWG\Property(property="rating", type="integer"),
 *         @SWG\Property(property="fee_fast", type="integer"),
 *         @SWG\Property(property="fee_long", type="integer"),
 *         @SWG\Property(property="km_fast", type="integer"),
 *         @SWG\Property(property="km_long", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="time_open", type="string"),
 *         @SWG\Property(property="time_close", type="string"),
 *         @SWG\Property(property="isSaturday", type="boolean"),
 *         @SWG\Property(property="phone", type="string"),
 *         @SWG\Property(property="isSunday", type="boolean"),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(
 *              property="getBanners",
 *              type="array",
 *              @SWG\Items(
 *                  ref="#/definitions/BannerResponse",
 *              ),
 *          ),
 *      ),
 *      ),
 *     @SWG\Definition(
 *         definition="CouponsResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="code", type="string"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="validity", type="string"),
 *         @SWG\Property(property="isShared", type="boolean"),
 *         @SWG\Property(property="status", type="string"),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="CategoryResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="SubCategoryResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="ProductResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="descriptio", type="string"),
 *         @SWG\Property(property="specification", type="string"),
 *         @SWG\Property(property="mark", type="string"),
 *         @SWG\Property(property="summary", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="categorys_id", type="integer"),
 *         @SWG\Property(property="sub_categorys_id", type="integer"),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="getCategory", ref="#/definitions/CategoryResponse"),
 *         @SWG\Property(
 *              property="getSubProducts",
 *              type="array",
 *              @SWG\Items(
 *                  ref="#/definitions/SubProductResponse",
 *              ),
 *          ),
 *      ),
 *     @SWG\Definition(
 *         definition="SubProductResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="code", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="price", type="integer"), *
 *         @SWG\Property(property="discount", type="integer"),
 *         @SWG\Property(property="isOffer", type="boolean"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(
 *              property="getPriceDymanic",
 *              type="array",
 *              @SWG\Items(
 *                  ref="#/definitions/PriceDymanicResponse",
 *              ),
 *          ),
 *      ),
 *     @SWG\Definition(
 *         definition="BannerResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="url", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="OrderResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="phone", type="string"),
 *         @SWG\Property(property="total", type="integer"),
 *         @SWG\Property(property="discount", type="integer"),
 *         @SWG\Property(property="nameCliente", type="string"),
 *         @SWG\Property(property="paymentType", type="string",enum={"MONEY","CARD","CRYPTO"}),
 *         @SWG\Property(property="typeShop", type="string",enum={"DELIVERY","IN_STORE"}),
 *         @SWG\Property(property="street", type="string"),
 *         @SWG\Property(property="city", type="string"),
 *         @SWG\Property(property="district", type="string"),
 *         @SWG\Property(property="state", type="string"),
 *         @SWG\Property(property="country", type="string"),
 *         @SWG\Property(property="reference", type="string"),
 *         @SWG\Property(property="complement", type="string"),
 *         @SWG\Property(property="numberHome", type="string"),
 *         @SWG\Property(property="zipCode", type="string"),
 *         @SWG\Property(property="latitude", type="integer"),
 *         @SWG\Property(property="longitude", type="integer"),
 *         @SWG\Property(property="status",type="string", enum={"OPEN","IN_PROGRESS","IN_ROUTER","CANCEL","CLOSE","SUSPENSE"}),
 *         @SWG\Property(property="client_id", type="integer"),
 *         @SWG\Property(property="custumers_id", type="integer"),
 *         @SWG\Property(property="coupons_id", type="integer"),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(
 *              property="getOrdersIetns",
 *              type="array",
 *              @SWG\Items(
 *                  ref="#/definitions/OrderItemResponse",
 *              ),
 *          ),
 *         @SWG\Property(property="getCustumer", ref="#/definitions/CustumerResponse"),
 *      ),
 *     @SWG\Definition(
 *         definition="OrderItemResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="quantity", type="string"),
 *         @SWG\Property(property="picture", type="string"),
 *         @SWG\Property(property="price", type="integer"),
 *         @SWG\Property(property="orders_id", type="integer"),
 *         @SWG\Property(property="sub_products_id", type="integer"),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="FavoriteResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="description", type="string"),
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="client_id", type="integer"),
 *         @SWG\Property(property="products_id", type="integer"),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="EvaluationResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="rating", type="integer"),
 *         @SWG\Property(property="client_id", type="integer"),
 *         @SWG\Property(property="orders_id", type="integer"),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 *     @SWG\Definition(
 *         definition="PriceDymanicResponse",
 *         @SWG\Property(property="id", type="integer"),
 *         @SWG\Property(property="description", type="integer"),
 *         @SWG\Property(property="price", type="integer"),
 *         @SWG\Property(property="roleQtd", type="integer"), *
 *         @SWG\Property(property="status", type="string",enum={"ACTIVE","INATIVE","REMOVE","BLOCK"}),
 *         @SWG\Property(property="created_at", type="string",example="2018-04-16 11:11:11"),
 *         @SWG\Property(property="updated_at", type="string",example="2018-04-16 11:11:11"),
 *      ),
 * )
 */
/**
 *
 * @SWG\Post(
 *         path="/client",
 *         tags={"client"},
 *         operationId="createClient",
 *         summary="Create new client entry",
 *         @SWG\Parameter(
 *             name="client",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Client"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *             @SWG\Schema(ref="#/definitions/ClientResponse"),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/client/{id}",
 *         tags={"client"},
 *         operationId="updateClient",
 *         summary="Update new client entry",
 *         @SWG\Parameter(
 *            name="id",
 *            description="id client",
 *            required=true,
 *            type="string",
 *            in="path"
 *         ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *             @SWG\Schema(ref="#/definitions/ClientResponse"),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\get(
 *         path="/client/{id}",
 *         tags={"client"},
 *         operationId="getClient",
 *         summary="get User",
 *         @SWG\Parameter(
 *            name="id",
 *            description="id client",
 *            required=true,
 *            type="string",
 *            in="path"
 *         ),
 *        @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *          @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *          )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/client/all/get",
 *         tags={"client"},
 *         operationId="allClient",
 *         summary="List client entry",
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/ClientResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/client/seach/{value}",
 *         tags={"client"},
 *         operationId="seachClient",
 *         summary="Seach client entry",
 *         @SWG\Parameter(
 *          name="value",
 *          description="value seach phone client",
 *          required=true,
 *          type="string",
 *          in="path",
 *        ),
  *      @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                     ref="#/definitions/ClientResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/address",
 *         tags={"address"},
 *         operationId="createAddress",
 *         summary="Create new address for client entry",
 *         @SWG\Parameter(
 *             name="address",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Address"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *             @SWG\Schema(ref="#/definitions/AddressResponse"),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/address/{id}",
 *         tags={"address"},
 *         operationId="updateAddress",
 *         summary="Update address entry",
 *         @SWG\Parameter(
 *            name="id",
 *            description="id address",
 *            required=true,
 *            type="string",
 *            in="path"
 *         ),
 *         @SWG\Parameter(
 *             name="address",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Address"),
 *        ),
 *        @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *          @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *          )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/address/{id}",
 *         tags={"address"},
 *         operationId="getAddress",
 *         summary="get address",
 *         @SWG\Parameter(
 *          name="id",
 *          description="id address",
 *          required=true,
 *          type="integer",
 *          in="path",
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *             @SWG\Schema(ref="#/definitions/AddressResponse"),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/address/{id}/all",
 *         tags={"address"},
 *         operationId="allAddress",
 *         summary="List allAddress entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id Cleint",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/AddressResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/shop/evaluation",
 *         tags={"shop"},
 *         operationId="createEvaluation",
 *         summary="Create evaluetion",
 *         @SWG\Parameter(
 *             name="evaluation",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Evaluation"),
 *        ),
 *        @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *          @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *          )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/shop/favorite",
 *         tags={"shop"},
 *         operationId="createFavorite",
 *         summary="Create favorite",
 *         @SWG\Parameter(
 *             name="evaluation",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Favorite"),
 *        ),
 *        @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *          @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *          )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/shop/favorite/{id}",
 *         tags={"shop"},
 *         operationId="getFavorite",
 *         summary="Create new client entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id Cleint",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/FavoriteResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/shop/geo/{latitude}/{longitude}",
 *         tags={"shop"},
 *         operationId="shopGeolocalizacao",
 *         summary="get shop in adderess",
 *         @SWG\Parameter(
 *              description="latitude address",
 *              required=true,
 *              name="latitude",
 *              type="integer",
 *              in="path",
 *          ),
 *         @SWG\Parameter(
 *              description="longitude address",
 *              required=true,
 *              name="longitude",
 *              type="integer",
 *              in="path",
 *          ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/CustumerResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/shop/category/{id}",
 *         tags={"shop"},
 *         operationId="categoryShop",
 *         summary="get category in shop active",
 *         @SWG\Parameter(
 *          name="id",
 *          description="id shop",
 *          required=true,
 *          type="integer",
 *          in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/CategoryResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/shop/products/{id}",
 *         tags={"shop"},
 *         operationId="productCategory",
 *         summary="get products in shop active",
 *         @SWG\Parameter(
 *          name="id",
 *          description="id Category",
 *          required=true,
 *          type="integer",
 *          in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/ProductResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/shop/subcategory/produto/all/{id}",
 *         tags={"shop"},
 *         operationId="producSubCategorytAll",
 *         summary="get products in shop active",
 *         @SWG\Parameter(
 *          name="id",
 *          description="id Sub Category",
 *          required=true,
 *          type="integer",
 *          in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/ProductResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/shop/subcategory/all/{id}",
 *         tags={"shop"},
 *         operationId="subCategoryShop",
 *         summary="get sub category in shop active",
 *         @SWG\Parameter(
 *          name="id",
 *          description="id shop",
 *          required=true,
 *          type="integer",
 *          in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/CategoryResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/shop/product/search",
 *         tags={"shop"},
 *         operationId="productShop",
 *         summary="List products in search",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id custumer",
 *              required=false,
 *              type="integer",
 *              in="query",
 *        ),
  *         @SWG\Parameter(
 *              name="value",
 *              description="value to search description",
 *              required=false,
 *              type="string",
 *              in="query",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/ProductResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/order",
 *         tags={"order"},
 *         operationId="createOrder",
 *         summary="Create new order for client entry",
 *         @SWG\Parameter(
 *             name="address",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Order"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *             @SWG\Schema(ref="#/definitions/AddressResponse"),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/order/all/get",
 *         tags={"order"},
 *         operationId="allClientOrder",
 *         summary="get order client",
*         @SWG\Parameter(
 *              name="status",
 *              description="status order",
 *              required=false,
 *              type="string",
 *              enum={"OPEN","IN_PROGRESS","IN_ROUTER","CANCEL","CLOSE","SUSPENSE"},
 *              in="query",
 *        ),
 *         @SWG\Parameter(
 *              name="dateBegin",
 *              description="date start order",
 *              required=true,
 *              type="string",
 *              in="query",
 *        ),
  *         @SWG\Parameter(
 *              name="dateEnd",
 *              description="date end order",
 *              required=true,
 *              type="string",
 *              in="query",
 *        ),
 *         @SWG\Parameter(
 *              name="client_id",
 *              description="id client",
 *              required=true,
 *              type="integer",
 *              in="query",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/OrderResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/order/{id}",
 *         tags={"order"},
 *         operationId="getOrderOnly",
 *         summary="get order client",
 *         @SWG\Parameter(
 *          name="id",
 *          description="id order",
 *          required=true,
 *          type="integer",
 *          in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              ref="#/definitions/OrderResponse",
 *            ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/admin/order/all",
 *         tags={"order"},
 *         operationId="allAdminOrder",
 *         summary="List order entry",
 *         @SWG\Parameter(
 *              name="status",
 *              description="status order",
 *              required=false,
 *              type="string",
 *              enum={"OPEN","IN_PROGRESS","IN_ROUTER","CANCEL","CLOSE","SUSPENSE"},
 *              in="query",
 *        ),
 *         @SWG\Parameter(
 *              name="dateBegin",
 *              description="date start order",
 *              required=true,
 *              type="string",
 *              in="query",
 *        ),
  *         @SWG\Parameter(
 *              name="dateEnd",
 *              description="date end order",
 *              required=true,
 *              type="string",
 *              in="query",
 *        ),
 *         @SWG\Parameter(
 *              name="custume_id",
 *              description="id custumer",
 *              required=true,
 *              type="integer",
 *              in="query",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/OrderResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/admin/order/update/status",
 *         tags={"order"},
 *         operationId="updateOrder",
 *         summary="update status Order",
 *         @SWG\Parameter(
 *              name="status",
 *              description="status order",
 *              required=false,
 *              type="string",
 *              enum={"OPEN","IN_PROGRESS","IN_ROUTER","CANCEL","CLOSE","SUSPENSE"},
 *              in="query",
 *        ),
 *         @SWG\Parameter(
 *              name="id",
 *              description="id order",
 *              required=true,
 *              type="integer",
 *              in="query",
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/product/category",
 *         tags={"product"},
 *         operationId="createCategory",
 *         summary="Create new category entry",
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Category"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/product/category/{id}",
 *         tags={"product"},
 *         operationId="updateCategory",
 *         summary="Update category entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id category",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Category"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
 /**
 *
 * @SWG\Post(
 *         path="/product/subcategory",
 *         tags={"product"},
 *         operationId="createSubProduct",
 *         summary="Create new sub category entry",
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/SubCategory"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/product/subcategory/{id}",
 *         tags={"product"},
 *         operationId="updateSubCategory",
 *         summary="Update sub category entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id category",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/SubCategory"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/product/subcategory/all/{id}",
 *         tags={"product"},
 *         operationId="subCategoryAll",
 *         summary="List SubCategory entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id Custumer",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/SubCategoryResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/product",
 *         tags={"product"},
 *         operationId="createProduct",
 *         summary="Create new product entry",
 *         @SWG\Parameter(
 *             name="product",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Product"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/product/{id}",
 *         tags={"product"},
 *         operationId="updateProduct",
 *         summary="Product update entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id product",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Product"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/product/subproduct",
 *         tags={"product"},
 *         operationId="createSubProduct",
 *         summary="Create new product entry",
 *         @SWG\Parameter(
 *             name="product",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/SubProduct"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 * @SWG\Put(
 *         path="/product/subproduct/{id}",
 *         tags={"product"},
 *         operationId="updateSubProduct",
 *         summary="Sub Product update entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id sub product",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/SubProduct"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/product/priceDymanic",
 *         tags={"product"},
 *         operationId="createPriceDymanic",
 *         summary="Create new priceDymanic entry",
 *         @SWG\Parameter(
 *             name="priceDymanic",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/PriceDymanic"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/product/priceDymanic/{id}",
 *         tags={"product"},
 *         operationId="updatePriceDymanic",
 *         summary="Price Dymanic update entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id priceDymanic",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/PriceDymanic"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/product/category/all/{id}",
 *         tags={"product"},
 *         operationId="allClient",
 *         summary="List client entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id Custumer",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/CategoryResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/product/all/{id}",
 *         tags={"product"},
 *         operationId="allAdminProduct",
 *         summary="List product entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id Category",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/ProductResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/product/{status}/{value}",
 *         tags={"product"},
 *         operationId="allStatusProduct",
 *         summary="List product entry",
 *         @SWG\Parameter(
 *              name="status",
 *              description="status product",
 *              required=true,
 *              type="string",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *              name="value",
 *              description="value description / code product",
 *              required=true,
 *              type="string",
 *              in="path",
 *        ),
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/ProductResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/banner",
 *         tags={"banner"},
 *         operationId="createBanner",
 *         summary="Create new banner entry",
 *         @SWG\Parameter(
 *             name="priceDymanic",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Banner"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/banner/{id}",
 *         tags={"banner"},
 *         operationId="updateBanner",
 *         summary="Banner  update entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id Banner",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Banner"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/custumer",
 *         tags={"custumer"},
 *         operationId="createCustumer",
 *         summary="Create new Custumer entry",
 *         @SWG\Parameter(
 *             name="custumer",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Custumer"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/custumer/{id}",
 *         tags={"custumer"},
 *         operationId="updateCustumer",
 *         summary="Create update Custumer entry",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id custumer",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
 *         @SWG\Parameter(
 *             name="custumer",
 *             in="body",
 *             required=true,
 *             @SWG\Schema(ref="#/definitions/Custumer"),
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
 /**
 *
 * @SWG\Post(
 *         path="/custumer/category",
 *         tags={"custumer"},
 *         operationId="createImportCategory",
 *         summary="Create new import Category entry",
 *         @SWG\Parameter(
 *             name="category",
 *             in="body",
 *             required=true,
 *             @SWG\Schema (
 *              type="array",
 *               @SWG\Items(
 *                  ref="#/definitions/Category"
 *                ),
 *             )
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/custumer/product",
 *         tags={"custumer"},
 *         operationId="createImportProduct",
 *         summary="Create new import product entry",
 *         @SWG\Parameter(
 *             name="product",
 *             in="body",
 *             required=true,
 *             @SWG\Schema (
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/Product",
 *                  ),
 *             )
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Sucess",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *             )
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {"read:product","write:product",}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/custumer/all/get",
 *         tags={"custumer"},
 *         operationId="allCustumer",
 *         summary="List client entry",
 *         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              @SWG\Property(property="current_page", type="integer"),
 *              @SWG\Property(property="first_page_url", type="string"),
 *              @SWG\Property(property="from", type="integer"),
 *              @SWG\Property(property="last_page", type="integer"),
 *              @SWG\Property(property="next_page_url", type="string"),
 *              @SWG\Property(property="path", type="string"),
 *              @SWG\Property(property="per_page", type="integer"),
 *              @SWG\Property(property="prev_page_url", type="integer"),
 *              @SWG\Property(property="to", type="string"),
 *              @SWG\Property(property="total", type="integer"),
 *              @SWG\Property(
 *                  property="data",
 *                  type="array",
 *                  @SWG\Items(
 *                      ref="#/definitions/CustumerResponse",
 *                  ),
 *            ),
 *         ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/custumer/{id}",
 *         tags={"custumer"},
 *         operationId="getCustumer",
 *         summary="Custumer get",
 *         @SWG\Parameter(
 *              name="id",
 *              description="id custumer",
 *              required=true,
 *              type="integer",
 *              in="path",
 *        ),
*         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              ref="#/definitions/CustumerResponse",
 *            ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Get(
 *         path="/user/me",
 *         tags={"user"},
 *         operationId="getMe",
 *         summary="User get",
*         @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *            @SWG\Schema (
 *              ref="#/definitions/CustumerResponse",
 *            ),
 *         ),
 *         @SWG\Response(response=400, description="Bad request"),
 *         @SWG\Response(response=500, description="Server Errors"),
 *         security={
 *           {"api_outh_token": {}}
 *          }
 *     )
 *
 */
/**
 * @SWG\Get(
 *      path="/user/sendPassword/{email}",
 *      tags={"user"},
 *      description="Reemenber password",
 *      summary="Reemenber password",
 *      @SWG\Parameter(
 *          name="email",
 *          description="E-mail user",
 *          required=true,
 *          type="string",
 *          in="path"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *          @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *       ),
 *       @SWG\Response(response=404, description="Unauthorized!"),
 *     security={
 *           {"api_key_auth": {}}
 *      }
 *     ),
 */
/**
 *
 * @SWG\Post(
 *         path="/user",
 *         tags={"user"},
 *         operationId="createUser",
 *         summary="Create new user entry",
 *         @SWG\Parameter(
 *             name="user",
 *             in="body",
 *             required=true,
 *             @SWG\Schema (
 *                  @SWG\Property(property="name", type="string"),
 *                  @SWG\Property(property="email", type="string"),
 *                  @SWG\Property(property="password", type="string"),
 *                  @SWG\Property(property="password_confirmation", type="string"), *
 *             )
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Successfully created user",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         @SWG\Response(
 *             response=400,
 *             description="Unauthorized action",
 *             @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         @SWG\Response(
 *             response=500,
 *             description="Failed to create user!",
 *               @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Put(
 *         path="/user/password",
 *         tags={"user"},
 *         operationId="Reset password User",
 *         summary="Reset password User",
 *         @SWG\Parameter(
 *             name="user",
 *             in="body",
 *             required=true,
 *             @SWG\Schema (
 *                  @SWG\Property(property="password", type="string"),
 *
 *             )
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Successfully created user",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         @SWG\Response(
 *             response=400,
 *             description="Unauthorized action",
 *             @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         @SWG\Response(
 *             response=500,
 *             description="Failed to create user!",
 *               @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
/**
 *
 * @SWG\Post(
 *         path="/user/login",
 *         tags={"user"},
 *         operationId="login",
 *         summary="login user",
 *         @SWG\Parameter(
 *             name="user",
 *             in="body",
 *             required=true,
 *            @SWG\Schema (
 *                  @SWG\Property(property="email", type="string"),
 *                  @SWG\Property(property="password", type="string"),
 *             )
 *        ),
 *         @SWG\Response(
 *             response=200,
 *             description="Successfully created user",
 *             @SWG\Schema (
 *                  @SWG\Property(property="access_token", type="string"),
 *                  @SWG\Property(property="token_type", type="string"),
 *                  @SWG\Property(property="expires_at", type="string")
 *             )
 *         ),
 *         @SWG\Response(
 *             response=400,
 *             description="Unauthorized action",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         @SWG\Response(
 *             response=300,
 *             description="Desabled, please confirm e-mail",
 *              @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         @SWG\Response(
 *             response=500,
 *             description="Failed to create user!",
 *             @SWG\Schema (
 *                  @SWG\Property(property="message", type="string"),
 *              )
 *         ),
 *         security={
 *           {"api_key_auth": {}}
 *          }
 *     )
 *
 */
