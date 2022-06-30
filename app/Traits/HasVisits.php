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

use App\Models\Visit;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasVisits
{
    use HasUserAgent;

    /**
     * @return void
     */
    public function saveVisit(string $userAgent, string $ip, string $country, string $deviceType): void
    {
        if (!blank($userAgent)) {
            $session = new Visit();

            $session->device_type = $deviceType;
            $session->user_agent = $userAgent;
            $session->ip = $ip;
            $session->location = $country;

            $this->visits()->save($session);
        }
    }

    public function visits(): MorphMany
    {
        return $this->morphMany(Visit::class, 'visitable')->latest();
    }
}
