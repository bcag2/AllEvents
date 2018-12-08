<?php

use Slim\Slim;

defined('_JEXEC') or die;

jimport('joomla.application.component.model');
include_once JPATH_BASE . '/components/com_allevents/views/agenda/view.html.php';
JLoader::import('components.com_allevents.tables.agenda', JPATH_ADMINISTRATOR);

/**
 * agendaServicesAllEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 *
 *
 *
 * get /agendas
 * get /agenda/:id
 * get /agenda/:id/event
 *
 * put /agenda/:id
 *
 * post /agenda
 *
 * post /agenda/:id/event
 *
 * get /agenda/search
 */
class agendaServicesAllEvents
{
    /**
     * agendaServicesAllEvents::agendaServicesAllEvents()
     *
     * @since 1.0
     */
    function __construct()
    {
        $app = Slim::getInstance();

        /**
         * Agenda Services
         */
        $app->group('/agenda', function () use ($app) {

            /**
             * @SWG\Get(
             *     path="/agenda/list/all",
             *     summary="List all AllEvents agendas",
             *     operationId="getAgendaListAll",
             *     tags={"AllEvents"},
             *
             *   @SWG\Response(
             *     response="200",
             *     description="Lists all agendas",
             *   ),
             *     @SWG\Response(
             *     response="401",
             *     description="Unauthorized"
             *   ),
             * )
             */
            $app->get('/list/all', function () use ($app) {
                $user = JFactory::getUser();
                if ($user->authorise('core.admin')) {
                    $query = $app->_db->getQuery(true);
                    $query->select('*');
                    $query->from($app->_db->quoteName('#__allevents_agenda'));
                    $query->where($app->_db->quoteName('published') . ' = ' . $app->_db->quote('1'));
                    $app->_db->setQuery($query);
                    $app->render(200, $app->_db->loadObjectList());
                }
                $app->render(403, [
                        'msg' => 'Forbidden.',
                    ]
                );
            }
            )->name('getAgendaListAll');

            /**
             * @SWG\Get(
             *     path="/agenda/single/{id}",
             *     summary="Return AllEvents agenda by ID",
             *     operationId="getAgendaSingleById",
             *     tags={"AllEvents"},
             *
             *     @SWG\Parameter(
             *     description="Agenda ID",
             *     in="path",
             *     name="id",
             *     required=true,
             *     type="string"
             * ),
             *
             *   @SWG\Response(
             *     response="200",
             *     description="Lists AllEvents agenda",
             *   ),
             *     @SWG\Response(
             *     response="401",
             *     description="Unauthorized"
             *   ),
             * )
             */
            $app->get('/single/:id', function ($id) use ($app) {
                $user = JFactory::getUser();
                if ($user->authorise('core.admin')) {
                    $query = $app->_db->getQuery(true);
                    $query->select('*')->from($app->_db->quoteName('#__allevents_agenda'))->where($app->_db->quoteName('published') . ' = ' . $app->_db->quote('1'))->where($app->_db->quoteName('agenda_id') . ' = ' . $app->_db->quote($id));
                    $app->_db->setQuery($query);
                    $app->render(200, $app->_db->loadObjectList());
                }
                $app->render(401, ['msg' => 'Unauthorized',]);
            }
            )->name('getAgendaSingleById');
            /**
             * @SWG\Get(
             *     path="/agenda/list/{id}/event",
             *     summary="List AllEvents events in Agenda by Agenda ID",
             *     description="",
             *     operationId="getAgendaListByIdEvent",
             *     tags={"AllEvents"},
             *
             *     @SWG\Parameter(
             *     description="Agenda ID",
             *     in="path",
             *     name="id",
             *     required=true,
             *     type="string"
             * ),
             *
             *   @SWG\Response(
             *     response="200",
             *     description="Lists AllEvents events in agenda",
             *   ),
             *     @SWG\Response(
             *     response="403",
             *     description="Forbidden"
             *   ),
             * )
             */
            $app->get('/list/:id/event', function ($id) use ($app) {
                $user = JFactory::getUser();
                if ($user->authorise('core.admin')) {
                    $query = $app->_db->getQuery(true);
                    $query->select('*')->from($app->_db->quoteName('#__allevents_events'))->where($app->_db->quoteName('published') . ' = ' . $app->_db->quote('1'))->where($app->_db->quoteName('agenda_id') . ' = ' . $app->_db->quote($id));
                    $app->_db->setQuery($query);
                    $app->render(200, $app->_db->
                    loadObjectList());
                }
                $app->render(403, ['msg' => 'Forbidden',]);
            }
            )->name('getAgendaListByIdEvent');
            /**
             * @SWG\Post(
             *     path="/agenda/create",
             *     summary="Create AllEvents Agenda",
             *     description="",
             *     operationId="postAgendaCreate",
             *     tags={"AllEvents"},
             *
             *     @SWG\Parameter(
             *     description="Agenda title",
             *     in="query",
             *     name="title",
             *     required=true,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Agenda title alias",
             *     in="query",
             *     name="alias",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Agenda description",
             *     in="query",
             *     name="description",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Set agenda published state: unpublished, published or trashed",
             *     in="query",
             *     name="published",
             *     required=true,
             *     enum={0,1,-2},
             *     type="integer",
             *     format="double"
             * ),
             *     @SWG\Parameter(
             *     description="Access level",
             *     in="query",
             *     name="access",
             *     required=true,
             *     type="integer",
             *     format="double"
             * ),
             *     @SWG\Parameter(
             *     description="Metadata: robots",
             *     in="query",
             *     name="robots",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Metadata: author",
             *     in="query",
             *     name="author",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Metadata description",
             *     in="query",
             *     name="metadesc",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Metakey",
             *     in="query",
             *     name="metakey",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Language ID ex. en-GB",
             *     in="query",
             *     name="language",
             *     required=false,
             *     type="string"
             * ),
             *
             *   @SWG\Response(
             *     response="200",
             *     description="Returns created agenda title",
             *   ),
             *     @SWG\Response(
             *     response="401",
             *     description="Error",
             *   ),
             *     @SWG\Response(
             *     response="403",
             *     description="Forbidden"
             *   ),
             * )
             */
            $app->post('/create', function () {
                $user = JFactory::getUser();
                $app = Slim::getInstance();
                if ($user->authorise('core.create', 'com_allevents')) {
                    $table = JTable::getInstance('agenda', 'AllEventsTable');
                    $agenda = new stdClass();
                    $agenda->titre = $app->request->params('title');
                    $agenda->alias = JFilterOutput::stringURLSafe($app->request->params('alias'));
                    if ($agenda->alias == "") {
                        $agenda->alias = JFilterOutput::stringURLSafe($agenda->titre);
                    }
                    $agenda->description = $app->request->params('description');
                    $agenda->published = $app->request->params('published');
                    $agenda->access = $app->request->params('access');
                    $agenda->metadata = '{"author":"' . $app->request->params('author') . '","robots":"' . $app->request->params('robots') . '"}';
                    $agenda->metadesc = $app->request->params('metadesc');
                    $agenda->metakey = $app->request->params('metakey');
                    $agenda->language = $app->request->params('language');
                    $data = (array )$agenda; // Push data into the table object
                    if (!$table->bind($data)) {
                        $app->render(401, ['msg' => 'Error: Incorrect format.',]);
                    }

                    //  Data checks including setting the alias based on the name
                    if (!$table->check()) {
                        $app->render(401, ['msg' => 'Error: Incorrect format.',]);
                    }

                    // Now store the article, raise notice if it doesn't get stored.
                    if (!$table->store(true)) {
                        $app->render(401, ['msg' => 'Error: Duplicate title or alias.',]);
                    }
                    $app->render(200, ['msg' => 'Created: ' . $agenda->title]);
                }
                $app->render(403, ['msg' => 'Forbidden',]);
            }
            )->name('postAgendaCreate');

            /**
             * @SWG\Put(
             *     path="/agenda/update/{id}",
             *     summary="Update AllEvents Agenda by ID",
             *     description="",
             *     operationId="putAgendaUpdateById",
             *     tags={"AllEvents"},
             *
             *     @SWG\Parameter(
             *     description="Agenda ID",
             *     in="path",
             *     name="id",
             *     required=true,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Agenda title",
             *     in="query",
             *     name="title",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Agenda title alias",
             *     in="query",
             *     name="alias",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Agenda description",
             *     in="query",
             *     name="description",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Set agenda published state: unpublished, published or trashed",
             *     in="query",
             *     name="published",
             *     required=false,
             *     enum={0,1,-2},
             *     type="integer",
             *     format="double"
             * ),
             *     @SWG\Parameter(
             *     description="Access level",
             *     in="query",
             *     name="access",
             *     required=false,
             *     type="integer",
             *     format="double"
             * ),
             *     @SWG\Parameter(
             *     description="Metadata description",
             *     in="query",
             *     name="metadesc",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Metakey",
             *     in="query",
             *     name="metakey",
             *     required=false,
             *     type="string"
             * ),
             *     @SWG\Parameter(
             *     description="Language ID ex. en-GB",
             *     in="query",
             *     name="language",
             *     required=false,
             *     type="string"
             * ),
             *
             *   @SWG\Response(
             *     response="200",
             *     description="Returns updated agenda title",
             *   ),
             *     @SWG\Response(
             *     response="401",
             *     description="Error",
             *   ),
             *     @SWG\Response(
             *     response="403",
             *     description="Forbidden"
             *   ),
             * )
             * TODO: Work in progress
             */
            $app->put('/update/:id', function ($id) use ($app) {
                $user = JFactory::getUser();
                if ($user->authorise('core.edit', 'com_allevents.agenda.' . $id) || $user->authorise('core.edit.own', 'com_allevents.agenda.' . $id)) {
                    $table = JTable::getInstance('agenda', 'AllEventsTable');
                    $table->load($id);
                    $agenda = new stdClass();
                    if ($app->request->params('title')) {
                        $agenda->titre = $app->request->params('title');
                    }

                    if ($app->request->params('alias')) {
                        $agenda->alias = JFilterOutput::stringURLSafe($app->request->params('alias'));
                    }

                    if ($app->request->params('access')) {
                        $agenda->access = $app->request->params('access');
                    }

                    if ($app->request->params('parent_id')) {
                        $agenda->parent_id = $app->request->params('parent_id');
                    }

                    if ($app->request->params('note')) {
                        $agenda->note = $app->request->params('note');
                    }

                    if ($app->request->params('description')) {
                        $agenda->description = $app->request->params('description');
                    }

                    if ($app->request->params('language')) {
                        $agenda->language = $app->request->params('language');
                    }
                    if ($app->request->params('published') === '1') {
                        $agenda->published = '1';
                    } elseif ($app->request->params('published') === '0') {
                        $agenda->published = '0';
                    } elseif ($app->request->params('published') === '-2') {
                        $agenda->published = '-2';
                    }

                    $data = (array )$agenda; // Bind data

                    if (!$table->bind($data)) {
                        $app->render(401, ['msg' => 'Error: Incorrect format.']);
                    }

                    // Check to make sure our data is valid, raise notice if it's not.
                    if (!$table->check()) {
                        $app->render(401, ['msg' => 'Error: Incorrect format.']);
                    }

                    // Now update the article, raise notice if it doesn't get stored.
                    if (!$table->store()) {
                        $app->render(401, ['msg' => 'Error: Duplicate alias.']);
                    }

                    $app->render(200, ['msg' => 'Updated content item id = ' . $id]);
                }

                $app->render(403, ['msg' => 'Forbidden']);
            }
            )->name('putAgendaUpdateById');
            /**
             * @SWG\Delete(
             *     path="/agenda/delete/{id}",
             *     summary="Delete AllEvents Agenda by ID",
             *     description="",
             *     operationId="deleteAgendaDeleteId",
             *     tags={"AllEvents"},
             *
             *     @SWG\Parameter(
             *     description="Agenda ID",
             *     in="path",
             *     name="id",
             *     required=true,
             *     type="string"
             * ),
             *
             *   @SWG\Response(
             *     response="200",
             *     description="Agenda ID deleted successfully",
             *   ),
             *     @SWG\Response(
             *     response="401",
             *     description="Unauthorized",
             *   ),
             *     @SWG\Response(
             *     response="403",
             *     description="Error deleting agenda ID"
             *   ),
             * )
             */
            $app->delete('/delete/:id', function ($id) use ($app) {
                $user = JFactory::getUser();
                $agenda = JTable::getInstance('agenda', 'AllEventsTable');
                if (!$agenda->load($id)) {
                    $app->render(404, ['msg' => 'Not Found',]);
                }

                if ($user->block !== '1' && in_array($agenda->access, $user->getAuthorisedViewLevels()) && $agenda->delete($id)) {
                    $app->render(200, ['msg' => 'Agenda ID ' . $id . ' deleted successfully.']);
                } elseif (!$agenda->delete($id)) {
                    $app->render(403, ['msg' => 'Error deleting agenda ID ' . $id]);
                }

                $app->render(401, ['msg' => 'Unauthorized',]);
            }
            );
        }
        );
    }

    /**
     * agendaServicesAllEvents::call()
     *
     * @return
     */
    function call()
    {
        return $this->next->call();
    }
}