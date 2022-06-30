<?php
/*
 * Copyright (c) 2022.
 *
 * SAFAROFF Agency. (https://safaroff.com) All Rights Reserved.
 *
 * Added by Samir Mammadhasanov (https://samirmhsnv.dev)
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace App\Traits;

use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

trait HasSession
{
    use HasUserAgent;

    /**
     * @throws BindingResolutionException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function saveSession(array $data): void
    {
        $session = new Session();

        $session->identifier = $data['identifier'];
        $session->user_agent = $data['user_agent'];
        $session->ip = $data['ip'];
        $session->location = $data['location'];
        $session->expires_at = $data['expires_at'];

        $this->sessions()->save($session);
    }

    public function sessions(): MorphMany
    {
        return $this->morphMany(Session::class, 'sessionable');
    }
}
