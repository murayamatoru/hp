package jp.co.nextdesign.service;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;

import jp.co.nextdesign.domain.Prefecture;
import jp.co.nextdesign.domain.orders.OrderType;
import jp.co.nextdesign.domain.products.Product;
import jp.co.nextdesign.domain.products.Stock;
import jp.co.nextdesign.domain.products.Warehouse;
import jp.co.nextdesign.service.ddb.DdBaseService;

/**
 * 購入サービスクラス
 * 引数型,戻り値型の例です。DDD的にリッチな例ではありません。
 * @author murayama
 *
 */
public class PurchaseService extends DdBaseService {
	
	/**
	 * 購入サービス1
	 * @return void結果
	 */
	public void svMethod01(){
	}

	/**
	 * 購入サービス2
	 * @return Void結果
	 */
	public Void svMethod02(){
		return null;
	}

	/**
	 * 購入サービス3
	 * @param d 引数１説明
	 * @param count 引数２説明
	 * @return 予定日
	 */
	public Integer svMethod03(Date d, Double count){
		return 100;
	}

//	public List<Integer> svMethod04(
//			int p1,
//			MyClass p2, 
//			List<Integer> p3, 
//			List<MyClass> p4){
//		return null;
//	}

}
