<?php
/**
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id:  New in v1.6.0 $
 */
namespace ZenCart\Controllers;

use ZenCart\FormValidation\FormValidation;
use ZenCart\Page\Builder;
use ZenCart\QueryBuilder\QueryBuilder;
use ZenCart\Request\Request as Request;
use ZenCart\Paginator\Paginator as Paginator;
use ZenCart\QueryBuilder\PaginatorBuilder as PaginatorBuilder;
use ZenCart\Services\LeadRoutes as LeadService;
use ZenCart\AdminUser\AdminUser as User;
use Valitron\Validator;


/**
 * Class AbstractLeadController
 * @package ZenCart\Controllers
 */
abstract class AbstractReportController extends AbstractListingController
{

    /**
     * @var string
     */
    protected $classPrefix = 'Report';
    /**
     * @var string
     */
    protected $mainTemplate = 'tplAdminReport.php';

    public function mainExecute()
    {
        $this->service->manageLanguageJoin();
        $this->queryBuilderDefinition->buildResults($this->queryBuilder, $this->dbConn,
            new \ZenCart\QueryBuilder\DerivedItemManager, $this->paginatorBuilder->getPaginator());
        $this->setDefaultTplVars($this->pageDefinitionBuilder, $this->queryBuilderDefinition);
    }
}
