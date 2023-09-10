/*
 * DDBuilder1.0が生成したファイルです。  [生成日時 2016/09/01-16:13:12]
 */
package jp.co.nextdesign.service.g;

import java.text.SimpleDateFormat;
import java.util.Calendar;

import jp.co.nextdesign.domain.Author;
import jp.co.nextdesign.domain.Edition;
import jp.co.nextdesign.domain.g.DdAuthorManager;
import jp.co.nextdesign.domain.g.DdEditionManager;
import jp.co.nextdesign.domain.g.DdStoreManager;
import jp.co.nextdesign.domain.store.Store;
import jp.co.nextdesign.service.ddb.DdBaseService;

/**
 * テスト用データを作成するサービス
 * このクラスはお客様コードを含むことになります。従ってDDBuilderは上書きしません。存在しない場合のみ新規作成します。
 * @author murayama
 *
 */
public class TestDataService extends DdBaseService{

	public void addTestData(int count){
		try {
			startService();
			begin();
			
			DdAuthorManager authorManager = new DdAuthorManager();
			Author author = new Author();
			author.setName("夏目漱石");
			authorManager.persist(author);
			
			Author author2 = new Author();
			author2.setName("森鴎外");
			authorManager.persist(author2);

			DdStoreManager storeManager = new DdStoreManager();
			Store store = new Store();
			store.setName("駅前店１");
			storeManager.persist(store);

			Store store2 = new Store();
			store2.setName("駅前店２");
			storeManager.persist(store2);

			DdEditionManager editionManager = new DdEditionManager();
			Edition edition = new Edition();
			edition.setName("初版");
			editionManager.persist(edition);

			Edition edition2 = new Edition();
			edition2.setName("第２版");
			editionManager.persist(edition2);

			commit();
		} catch (Exception e) {
			rollback();
		} finally {
			endService();
		}
	}
}
